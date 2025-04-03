import fs from 'fs/promises';
import path from 'path';

// Define the CSS files to process
const cssFiles = [
  'dash.css',
  'login.css',
  'prescription.css',
  'reminder.css',
  'search.css',
  'style.css'
];

// Define the PHP files to update
const phpFiles = [
  'index.php',
  'dash.php',
  'prescription.php',
  'register.php',
  'reminder.php',
  'search.php'
];

// Common CSS rules that appear in multiple files
const commonRules = [
  // Reset and base styles
  '* {',
  'body {',
  'a {',
  
  // Header styles
  'header {',
  '.logo {',
  'nav {',
  
  // Button styles
  '.btn {',
  '.btn-primary {',
  
  // Avatar/profile styles
  '.avatar {',
  '.profile-pic {',
  '.user-image {',
  
  // Icon styles
  '.icon-button {',
  '.icon-btn {',
];

async function readCSSFile(filename) {
  try {
    const content = await fs.readFile(`css/${filename}`, 'utf8');
    return content;
  } catch (error) {
    console.error(`Error reading ${filename}:`, error);
    return '';
  }
}

async function extractCommonCSS() {
  let allCSS = '';
  
  // Concatenate all CSS files
  for (const file of cssFiles) {
    const css = await readCSSFile(file);
    allCSS += `/* From ${file} */\n${css}\n\n`;
  }
  
  // Extract common rules
  let commonCSS = '/* Common styles */\n';
  let pageSpecificCSS = {};
  
  // Initialize page-specific CSS objects
  for (const file of cssFiles) {
    pageSpecificCSS[file] = `/* Page-specific styles for ${file} */\n`;
  }
  
  // Simple extraction based on rule selectors
  // This is a simplified approach - a real implementation would use a CSS parser
  const lines = allCSS.split('\n');
  let currentFile = '';
  let inCommonRule = false;
  let currentRule = '';
  
  for (let i = 0; i < lines.length; i++) {
    const line = lines[i];
    
    // Track which file we're processing
    if (line.startsWith('/* From ')) {
      currentFile = line.replace('/* From ', '').replace(' */', '');
      continue;
    }
    
    // Check if this line starts a rule that should be in common CSS
    const isCommonRuleStart = commonRules.some(rule => line.trim().startsWith(rule));
    
    if (isCommonRuleStart) {
      inCommonRule = true;
      currentRule = line + '\n';
    } else if (inCommonRule) {
      currentRule += line + '\n';
      
      // Check if this line ends the current rule
      if (line.trim() === '}') {
        commonCSS += currentRule;
        inCommonRule = false;
        currentRule = '';
      }
    } else if (currentFile && line.trim() !== '') {
      // Add to page-specific CSS if not a common rule
      pageSpecificCSS[currentFile] += line + '\n';
    }
  }
  
  return { commonCSS, pageSpecificCSS };
}

async function writeNewCSSFiles(commonCSS, pageSpecificCSS) {
  try {
    // Create css directory if it doesn't exist
    await fs.mkdir('new-css', { recursive: true });
    
    // Write common CSS file
    await fs.writeFile('new-css/main.css', commonCSS);
    console.log('Created main.css with common styles');
    
    // Write page-specific CSS files
    for (const [file, css] of Object.entries(pageSpecificCSS)) {
      const newFilename = file; // Keep the same filename
      await fs.writeFile(`new-css/${newFilename}`, css);
      console.log(`Created ${newFilename} with page-specific styles`);
    }
  } catch (error) {
    console.error('Error writing CSS files:', error);
  }
}

async function updatePHPFiles() {
  for (const file of phpFiles) {
    try {
      const content = await fs.readFile(file, 'utf8');
      
      // Update CSS references to include main.css and the page-specific CSS
      let updatedContent = content;
      
      // Determine which page-specific CSS file to include
      let pageSpecificCSS = '';
      if (file === 'index.php') pageSpecificCSS = 'style.css';
      else if (file === 'dash.php') pageSpecificCSS = 'dash.css';
      else if (file === 'prescription.php') pageSpecificCSS = 'prescription.css';
      else if (file === 'register.php') pageSpecificCSS = 'login.css';
      else if (file === 'reminder.php') pageSpecificCSS = 'reminder.css';
      else if (file === 'search.php') pageSpecificCSS = 'search.css';
      
      // Replace CSS link tags
      const linkRegex = /<link rel="stylesheet" href="css\/[^"]+\.css">/g;
      const newLinks = `<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/${pageSpecificCSS}">`;
      
      updatedContent = updatedContent.replace(linkRegex, newLinks);
      
      // Write updated PHP file
      await fs.writeFile(`new-${file}`, updatedContent);
      console.log(`Updated ${file} with new CSS references`);
    } catch (error) {
      console.error(`Error updating ${file}:`, error);
    }
  }
}

async function main() {
  console.log('Starting CSS refactoring...');
  
  // Extract common CSS and page-specific CSS
  const { commonCSS, pageSpecificCSS } = await extractCommonCSS();
  
  // Write new CSS files
  await writeNewCSSFiles(commonCSS, pageSpecificCSS);
  
  // Update PHP files to reference the new CSS files
  await updatePHPFiles();
  
  console.log('CSS refactoring complete!');
}

main().catch(error => {
  console.error('Error in main process:', error);
});
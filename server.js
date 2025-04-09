const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 3000;

const server = http.createServer((req, res) => {
  if (req.method === 'GET' && req.url === '/') {
    const html = fs.readFileSync(path.join(__dirname, 'index.html'), 'utf8');
    res.writeHead(200, { 'Content-Type': 'text/html' });
    res.end(html);
  } else if (req.method === 'POST' && req.url === '/ask') {
    let body = '';
    req.on('data', chunk => (body += chunk));
    req.on('end', () => {
      const { prompt } = JSON.parse(body);

      const ollamaReq = http.request(
        {
          hostname: 'localhost',
          port: 11434,
          path: '/api/generate',
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          }
        },
        ollamaRes => {
          let data = '';
          ollamaRes.on('data', chunk => (data += chunk));
          ollamaRes.on('end', () => {
            const parsed = JSON.parse(data);
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify({ response: parsed.response }));
          });
        }
      );

      const bodyData = JSON.stringify({
        model: 'deepseek-coder:8b',
        prompt,
        stream: false
      });

      ollamaReq.write(bodyData);
      ollamaReq.end();
    });
  } else {
    res.writeHead(404);
    res.end('Niet gevonden');
  }
});

server.listen(PORT, () => {
  console.log(`Server draait op http://localhost:${PORT}`);
});

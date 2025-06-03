<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Vehicles API Docs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f9fafb;
    }
    .method-badge {
      padding: 0.35em 0.65em;
      border-radius: 0.25rem;
      font-weight: bold;
      font-size: 0.9em;
      display: inline-block;
      text-transform: uppercase;
    }
    .GET    { background: #0d6efd; color: white; }
    .POST   { background: #198754; color: white; }
    .PATCH  { background: #ffc107; color: black; }
    .DELETE { background: #dc3545; color: white; }
    pre {
      background: #f1f1f1;
      padding: 1em;
      border-radius: 5px;
      overflow-x: auto;
    }
    .copy-btn {
      float: right;
      font-size: 0.8em;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="#">Vehicles API</a>
    </div>
  </nav>

  <div class="container">
    <h1 class="mb-4">API Documentation</h1>
    <p class="lead">A simple RESTful API to manage vehicles. Use the following endpoints to interact with the system.</p>

    <div class="accordion" id="apiAccordion">

      <!-- GET -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="getHeader">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#getEndpoint" aria-expanded="true">
            <span class="method-badge GET me-2">GET</span> /api/veiculos
          </button>
        </h2>
        <div id="getEndpoint" class="accordion-collapse collapse show" data-bs-parent="#apiAccordion">
          <div class="accordion-body">
            <p>Retrieve a list of vehicles. You can filter using query parameters.</p>
            <strong>Query Parameters:</strong>
            <ul>
              <li><code>marca</code> – Filter by brand</li>
              <li><code>ano</code> – Filter by year</li>
            </ul>
            <strong>Example Response:</strong>
            <button class="btn btn-sm btn-outline-secondary copy-btn" onclick="copyToClipboard('getResponse')">Copy</button>
            <pre id="getResponse">
{
  "success": true,
  "data": [
    {
      "id": 1,
      "veiculo": "Gol",
      "marca": "Volkswagen",
      "ano": 2010,
      "descricao": "Modelo básico",
      "vendido": false
    }
  ]
}
            </pre>
          </div>
        </div>
      </div>

      <!-- POST -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="postHeader">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#postEndpoint">
            <span class="method-badge POST me-2">POST</span> /api/veiculos
          </button>
        </h2>
        <div id="postEndpoint" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
          <div class="accordion-body">
            <p>Create a new vehicle.</p>
            <strong>Body Parameters:</strong>
            <ul>
              <li><code>veiculo</code> – string (required)</li>
              <li><code>marca</code> – string (required)</li>
              <li><code>ano</code> – integer (required)</li>
              <li><code>descricao</code> – string (optional)</li>
              <li><code>vendido</code> – boolean (required)</li>
            </ul>
            <strong>Example Request:</strong>
            <button class="btn btn-sm btn-outline-secondary copy-btn" onclick="copyToClipboard('postExample')">Copy</button>
            <pre id="postExample">
{
  "veiculo": "Civic",
  "marca": "Honda",
  "ano": 2018,
  "descricao": "Automático",
  "vendido": false
}
            </pre>
          </div>
        </div>
      </div>

      <!-- PATCH -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="patchHeader">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#patchEndpoint">
            <span class="method-badge PATCH me-2">PATCH</span> /api/veiculos/{id}
          </button>
        </h2>
        <div id="patchEndpoint" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
          <div class="accordion-body">
            <p>Update one or more fields of a specific vehicle.</p>
            <strong>Partial Body Example:</strong>
            <pre>
{
  "vendido": true
}
            </pre>
          </div>
        </div>
      </div>

      <!-- DELETE -->
      <div class="accordion-item mb-3">
        <h2 class="accordion-header" id="deleteHeader">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#deleteEndpoint">
            <span class="method-badge DELETE me-2">DELETE</span> /api/veiculos/{id}
          </button>
        </h2>
        <div id="deleteEndpoint" class="accordion-collapse collapse" data-bs-parent="#apiAccordion">
          <div class="accordion-body">
            <p>Delete a vehicle by its ID.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center text-muted py-4 mt-5">
    <small>&copy; 2025 Vehicles API</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function copyToClipboard(elementId) {
      const text = document.getElementById(elementId).innerText;
      navigator.clipboard.writeText(text).then(() => {
        alert("Copied to clipboard!");
      });
    }
  </script>
</body>
</html>

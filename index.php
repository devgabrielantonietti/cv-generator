<?php
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerador de Currículo - Formulário</title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="index.php">CV Generator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"
            aria-controls="nav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Formulário</a></li>
        <li class="nav-item"><a class="nav-link" href="https://www.markdownguide.org/" target="_blank" rel="noopener">Markdown Guide</a></li>
        <li class="nav-item"><a class="nav-link" href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank" rel="noopener">Bootstrap</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-4">
  <h2 class="mb-1">Gerador de Currículo</h2>
  <p class="text-secondary mb-4">Preencha os dados e clique em <strong>Gerar Currículo</strong>.</p>

  <form id="cvForm" method="post" action="process.php" novalidate>
    <section class="card shadow-sm mb-4">
      <div class="card-body">
        <h5 class="card-title">Dados Pessoais</h5>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome *</label>
            <input name="nome" type="text" class="form-control" required>
            <div class="invalid-feedback">Informe seu nome.</div>
          </div>
          <div class="col-md-3">
            <label class="form-label">Data de Nascimento *</label>
            <input id="dtNasc" name="data_nasc" type="date" class="form-control" required>
            <div class="invalid-feedback">Informe sua data de nascimento.</div>
          </div>
          <div class="col-md-3">
            <label class="form-label">Idade</label>
            <input id="idade" name="idade" type="text" class="form-control" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control" placeholder="voce@exemplo.com">
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefone</label>
            <input name="telefone" type="text" class="form-control" placeholder="(xx) xxxxx-xxxx">
          </div>
        </div>
      </div>
    </section>

    <section class="card shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title mb-0">Experiência Profissional</h5>
          <button id="addExp" type="button" class="btn btn-primary btn-sm">+ Adicionar</button>
        </div>

        <div id="experiencias" class="mt-3">
          <div class="exp-item border rounded p-3 mb-3 bg-white">
            <input name="exp_titulo[]" class="form-control mb-2" placeholder="Cargo / Empresa">
            <div class="row g-2">
              <div class="col-md-6">
                <input name="exp_periodo[]" class="form-control" placeholder="Período (ex.: 01/2021 – 05/2023)">
              </div>
              <div class="col-md-6">
                <input name="exp_local[]" class="form-control" placeholder="Local (ex.: Curitiba/PR)">
              </div>
            </div>
            <textarea name="exp_desc[]" class="form-control mt-2" rows="2" placeholder="Principais atividades e resultados"></textarea>
            <button type="button" class="btn btn-danger btn-sm remover-exp d-none mt-2">Remover</button>
          </div>
        </div>
      </div>
    </section>

    <section class="card shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title mb-0">Formação</h5>
          <button id="addForm" type="button" class="btn btn-primary btn-sm">+ Adicionar</button>
        </div>

        <div id="formacoes" class="mt-3">
          <div class="form-item border rounded p-3 mb-3 bg-white">
            <input name="form_titulo[]" class="form-control mb-2" placeholder="Curso / Instituição">
            <input name="form_periodo[]" class="form-control" placeholder="Período (ex.: 2020 – atual)">
          </div>
        </div>
      </div>
    </section>

    <section class="card shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title mb-0">Referências</h5>
          <button id="addRef" type="button" class="btn btn-primary btn-sm">+ Adicionar</button>
        </div>
        <div id="referencias" class="mt-3">
          <div class="ref-item border rounded p-3 mb-3 bg-white">
            <input name="ref_nome[]" class="form-control mb-2" placeholder="Nome da referência">
            <input name="ref_contato[]" class="form-control" placeholder="Contato (email/telefone)">
            <button type="button" class="btn btn-danger btn-sm remover-ref d-none mt-2">Remover</button>
          </div>
        </div>
      </div>
    </section>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Gerar Currículo</button>
      <button type="button" id="clearBtn" class="btn btn-warning">Limpar</button>
    </div>
  </form>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

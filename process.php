<?php

function esc($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nome       = $_POST['nome']        ?? '';
$data_nasc  = $_POST['data_nasc']   ?? '';
$idade      = $_POST['idade']       ?? '';
$email      = $_POST['email']       ?? '';
$telefone   = $_POST['telefone']    ?? '';

$exp_titulos  = $_POST['exp_titulo']   ?? [];
$exp_descs    = $_POST['exp_desc']     ?? [];
$exp_periodos = $_POST['exp_periodo']  ?? [];
$exp_locais   = $_POST['exp_local']    ?? [];

$form_titulos = $_POST['form_titulo']  ?? [];
$form_periodos= $_POST['form_periodo'] ?? [];

$ref_nomes    = $_POST['ref_nome']     ?? [];
$ref_contatos = $_POST['ref_contato']  ?? [];
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Currículo de <?= esc($nome) ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    .cv-container { max-width: 900px; margin: 24px auto; background: #fff; padding: 28px; }
    .cv-section-title { text-transform: uppercase; letter-spacing: .06em; font-weight: 700; margin-top: 1.25rem; margin-bottom: .5rem; }
    @media print {
      .no-print { display:none; }
      body { background: #fff !important; }
      .cv-container { box-shadow: none !important; margin: 0; max-width: 100%; }
    }
  </style>
</head>
<body>
<div class="container cv-container shadow-sm">
  <div class="d-flex justify-content-between align-items-start">
    <div>
      <h2 class="mb-1"><?= esc($nome) ?></h2>
      <div class="text-secondary">
        <?= esc($email) ?><?php if($telefone) echo ' | ' . esc($telefone); ?>
      </div>
      <div class="small text-secondary">
        Data de nascimento: <?= esc($data_nasc) ?><?php if($idade !== '') echo ' — Idade: ' . esc($idade); ?>
      </div>
    </div>
    <div class="no-print">
      <button onclick="window.print()" class="btn btn-primary btn-sm">Imprimir / Salvar PDF</button>
      <a href="index.php" class="btn btn-secondary btn-sm">Voltar</a>
    </div>
  </div>

  <hr>

  <div>
    <div class="cv-section-title">Experiência</div>
    <?php
      $hasExp = false;
      $maxExp = max(count($exp_titulos), count($exp_descs), count($exp_periodos), count($exp_locais));
      for ($i=0; $i<$maxExp; $i++){
        $t = trim($exp_titulos[$i] ?? '');
        $d = trim($exp_descs[$i] ?? '');
        $p = trim($exp_periodos[$i] ?? '');
        $l = trim($exp_locais[$i] ?? '');

        if ($t==='' && $d==='' && $p==='' && $l==='') continue;
        $hasExp = true;
        echo '<div class="mb-3">';
        echo '<strong>' . esc($t) . '</strong>';
        if ($p || $l) {
          echo '<div class="text-secondary small">';
          if ($p) echo esc($p);
          if ($p && $l) echo ' • ';
          if ($l) echo esc($l);
          echo '</div>';
        }
        if ($d) echo '<div>' . nl2br(esc($d)) . '</div>';
        echo '</div>';
      }
      if (!$hasExp) echo '<p class="text-secondary">Nenhuma experiência informada.</p>';
    ?>
  </div>

  <div>
    <div class="cv-section-title">Formação</div>
    <?php
      $hasForm = false;
      $maxForm = max(count($form_titulos), count($form_periodos));
      echo '<ul class="mb-0">';
      for ($i=0; $i<$maxForm; $i++){
        $t = trim($form_titulos[$i] ?? '');
        $p = trim($form_periodos[$i] ?? '');
        if ($t==='' && $p==='') continue;
        $hasForm = true;
        echo '<li><strong>' . esc($t) . '</strong>';
        if ($p) echo ' — <span class="text-secondary">' . esc($p) . '</span>';
        echo '</li>';
      }
      if (!$hasForm) echo '<li class="text-secondary">Não informado</li>';
      echo '</ul>';
    ?>
  </div>

  <div>
    <div class="cv-section-title">Referências</div>
    <?php
      $hasRef = false;
      $maxRef = max(count($ref_nomes), count($ref_contatos));
      echo '<ul class="mb-0">';
      for ($i=0; $i<$maxRef; $i++){
        $n = trim($ref_nomes[$i] ?? '');
        $c = trim($ref_contatos[$i] ?? '');
        if ($n==='' && $c==='') continue;
        $hasRef = true;
        echo '<li>' . esc($n);
        if ($c) echo ' — <span class="text-secondary">' . esc($c) . '</span>';
        echo '</li>';
      }
      if (!$hasRef) echo '<li class="text-secondary">Não informado</li>';
      echo '</ul>';
    ?>
  </div>
</div>
</body>
</html>

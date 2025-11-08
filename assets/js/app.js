// Cálculo automático de idade
function calcularIdade(dtString) {
  if (!dtString) return '';
  const hoje = new Date();
  const nasc = new Date(dtString);
  if (isNaN(nasc)) return '';
  let idade = hoje.getFullYear() - nasc.getFullYear();
  const m = hoje.getMonth() - nasc.getMonth();
  if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
  return idade;
}

$(document).ready(function () {
  // atualizar idade ao mudar data
  $('#dtNasc').on('change', function () {
    $('#idade').val(calcularIdade(this.value));
  });

  // validação simples do Bootstrap
  $('#cvForm').on('submit', function (e) {
    const form = this;
    if (!form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
    }
    form.classList.add('was-validated');
  });

  // adicionar experiência
  $('#addExp').on('click', function () {
    const item = $('.exp-item').first().clone();
    item.find('input, textarea').val('');
    item.find('.remover-exp').removeClass('d-none');
    $('#experiencias').append(item);
  });

  // remover experiência
  $('#experiencias').on('click', '.remover-exp', function () {
    $(this).closest('.exp-item').remove();
  });

  // adicionar formação
  $('#addForm').on('click', function () {
    const item = $('.form-item').first().clone();
    item.find('input').val('');
    $('#formacoes').append(item);
  });

  // referências
  $('#addRef').on('click', function () {
    const item = $('.ref-item').first().clone();
    item.find('input').val('');
    item.find('.remover-ref').removeClass('d-none');
    $('#referencias').append(item);
  });

  $('#referencias').on('click', '.remover-ref', function () {
    $(this).closest('.ref-item').remove();
  });

  // limpar formulário
  $('#clearBtn').on('click', function () {
    if (!confirm('Limpar formulário?')) return;
    $('#cvForm')[0].reset();
    $('#idade').val('');

    // manter apenas o primeiro item de cada lista
    $('#experiencias .exp-item').not(':first').remove();
    $('#formacoes .form-item').not(':first').remove();
    $('#referencias .ref-item').not(':first').remove();

    // esconder botões de remover do primeiro item
    $('.remover-exp, .remover-ref').addClass('d-none');

    // remover estado de validação
    $('#cvForm').removeClass('was-validated');
  });
});

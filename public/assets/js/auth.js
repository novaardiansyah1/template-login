$(document).ready(function() {
  $('.iconlock').click(function() {
    let password = $('#password').attr('type');
    if(password == 'password') {
      $(this).html(`<i class="fas fa-fw fa-eye-slash"></i>`);
      $('#password, #password1').attr('type','text');
    } else {
      $(this).html(`<i class="fas fa-fw fa-eye"></i>`);
      $('#password, #password1').attr('type','password');
    }
  });
  
  $('#syaratketentuan').click(function() {
    if($(this).val() == 'true') {
      $('button[type="submit"]').removeAttr('disabled');
      $(this).val('false');
    } else {
      $('button[type="submit"]').attr('disabled','true');
      $(this).val('true');
    }
  });
  
  let title = $('#flashdata').data('title');
  
  if(title) {
    Swal.fire({
      title: title,
      text: $('#flashdata').data('pesan'),
      icon: $('#flashdata').data('type'),
    });
  }
  
});
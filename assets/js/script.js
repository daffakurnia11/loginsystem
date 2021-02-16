$(function() {
  $('.insertDataModal').on('click', function() {
    $('.modal-title').html('Add New Menu');
    $('.form-submit').attr('action', 'http://localhost/loginsystem/menu')
    $('#menu').val('');
    $('#id').val('');
    $('.modalButton').html('Add Menu');
  })
  $('.updateDataModal').on('click', function() {
    $('.form-submit').attr('action', 'http://localhost/loginsystem/menu/edit')
    $('.modal-title').html('Edit Menu');
    $('.modalButton').html('Edit Menu');
    
    const id = $(this).data('id');
    
    $.ajax({
      url: 'http://localhost/loginsystem/menu/update',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#menu').val(data.menu);
        $('#id').val(data.id);
      }
    })
  })
})
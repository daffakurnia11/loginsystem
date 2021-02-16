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
$(function() {
  $('.insertSubMenu').on('click', function() {
    $('.modal-title').html('Add New Sub Menu');
    $('.form-submit').attr('action', 'http://localhost/loginsystem/menu/submenu')
    $('#id').val('');
    $('#title').val('');
    $('#url').val('');
    $('#icon').val('');
    $('.modalButton').html('Add Sub Menu');
  })
  $('.updateSubMenu').on('click', function() {
    $('.form-submit').attr('action', 'http://localhost/loginsystem/menu/editsub')
    $('.modal-title').html('Edit Sub Menu');
    $('.modalButton').html('Edit Sub Menu');
    
    const id = $(this).data('id');
    
    $.ajax({
      url: 'http://localhost/loginsystem/menu/updatesub',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        console.log(data)
        $('#id').val(data.id);
        $('#menu_id').val(data.menu_id);
        $('#menu_id').html(data.menu);
        $('#title').val(data.title);
        $('#url').val(data.url);
        $('#icon').val(data.icon);
        if (data.is_active == '1') {
          $('#active').prop( "checked", true );
        } else {
          $('#active').prop( "checked", false );
        }
      }
    })
  })
})
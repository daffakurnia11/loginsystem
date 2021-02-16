const globalURL = 'http://localhost/loginsystem/';

$(function() {
  $('.insertDataModal').on('click', function() {
    $('.modal-title').html('Add New Menu');
    $('.form-submit').attr('action', globalURL + 'menu')
    $('#menu').val('');
    $('#id').val('');
    $('.modalButton').html('Add Menu');
  })

  $('.updateDataModal').on('click', function() {
    $('.form-submit').attr('action', globalURL + 'menu/edit')
    $('.modal-title').html('Edit Menu');
    $('.modalButton').html('Edit Menu');
    
    const id = $(this).data('id');
    
    $.ajax({
      url: globalURL + 'menu/update',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#menu').val(data.menu);
        $('#id').val(data.id);
      }
    })
  })

  $('.insertSubMenu').on('click', function() {
    $('.modal-title').html('Add New Sub Menu');
    $('.form-submit').attr('action', globalURL + 'menu/submenu')
    $('#id').val('');
    $('#title').val('');
    $('#url').val('');
    $('#icon').val('');
    $('.modalButton').html('Add Sub Menu');
  })

  $('.updateSubMenu').on('click', function() {
    $('.form-submit').attr('action', globalURL + 'menu/editsub')
    $('.modal-title').html('Edit Sub Menu');
    $('.modalButton').html('Edit Sub Menu');
    
    const id = $(this).data('id');
    
    $.ajax({
      url: globalURL + 'menu/updatesub',
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

  $('.insertRoleModal').on('click', function() {
    $('.modal-title').html('Add New Role');
    $('.form-submit').attr('action', globalURL + 'admin/role')
    $('#role').val('');
    $('#id').val('');
    $('.modalButton').html('Add Role');
  })

  $('.updateRoleModal').on('click', function() {
    $('.form-submit').attr('action', globalURL + 'admin/editrole')
    $('.modal-title').html('Edit Role');
    $('.modalButton').html('Edit Role');
    
    const id = $(this).data('id');
    
    $.ajax({
      url: globalURL + 'admin/updaterole',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#role').val(data.role);
        $('#id').val(data.id);
      }
    })
  })

  $('.accessCheck').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: globalURL + 'admin/changeaccess',
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = globalURL + 'admin/access/'+ roleId;
      }
    })
  })
})
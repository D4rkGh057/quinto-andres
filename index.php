<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</head>
<body>
    <h2>Listado de Estudiantes</h2>
    <p>Lista de todos los estudiantes.</p>
    
    <table id="dg" title="My Users" class="easyui-datagrid" style="width:700px;height:250px" method="GET"
            url="http://localhost/api.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="cedula" width="50">Cedula</th>
                <th field="nombre" width="50">Nombre</th>
                <th field="apellido" width="50">Apellido</th>
                <th field="direccion" width="50">Direccion</th>
                <th field="telefono" width="50">Telefono</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Estudiante</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>User Information</h3>
            <div style="margin-bottom:10px">
                <input name="cedula" class="easyui-textbox" id="cedula" required="true" label="Cedula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" id="nombre" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="apellido" class="easyui-textbox" id="apellido" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="direccion" class="easyui-textbox" id="direccion" required="true"  label="Direccion:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="telefono" class="easyui-textbox"id="telefono" required="true"  label="Telefono:" style="width:100%">
            </div>
            
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="actualizar()" style="width:90px">Actualizar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','New User');
            $('#fm').form('clear');
            url = 'http://localhost/api.php';
        }
        var urlAct;

        function editUser() {
            var row = $('#dg').datagrid('getSelected');
            $('#botonAct').show();
            $('#botonGuardar').hide();
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit User');
                $('#fm').form('load', row);
                urlAct = 'http://localhost/api.php?var=' + row.cedula;
            };

        }

        function actualizar() {
            var cedula= document.getElementById('cedula').value;
            var nombre= document.getElementById('nombre').value;
            var apellido= document.getElementById('apellido').value;
            var direccion= document.getElementById('direccion').value;
            var telefono= document.getElementById('telefono').value;
            var datos={
                "cedula": cedula,
                "nombre": nombre,
                "apellido": apellido,
                "direccion": direccion,
                "telefono": telefono
            }
            console.log(datos);
            $.ajax({
                url: 'http://localhost/api.php',
                type: 'PUT',
                data: JSON.stringify(datos), 
                contentType: 'application/json',  
                success: function (result) {
                    if (result == "Se actualizó correctamente") {
                        console.log("Se actualizó correctamente");
                        $('#dg').datagrid('reload'); 
                        $('#dlg').dialog('close');
                    } else {
                        console.log("Se actualizó correctamente");
                        $('#dg').datagrid('reload'); 
                        $('#dlg').dialog('close');
                    }
                },
                dataType: 'json'
            });
        }



        function saveUser(){
           
            $('#fm').form('submit',{
                url: url,
                method: "POST", 
                iframe: false,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }

        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirm', 'Are you sure you want to destroy this user?', function (r) {
                    if (r) {
                        $.ajax({
                            url: 'http://localhost/api.php?var=' + row.cedula,
                            type: 'DELETE',
                            success: function (result) {
                                if (result.success) {
                                    $('#dg').datagrid('deleteRow', $('#dg').datagrid('getRowIndex', row));
                                } else {
                                    $('#dg').datagrid('deleteRow', $('#dg').datagrid('getRowIndex', row));
                                }
                            },
                            dataType: 'json'
                        });
                    }
                });
            }
        }


    </script>
</body>
</html>
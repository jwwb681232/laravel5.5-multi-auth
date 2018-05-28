<script>
    var handleGritterMessage = function () {
        @if (session('message'))
        $.gritter.add({
            title: 'message',
            text: '{{ session('message') }}'
        });
        @endif
    };

    var handleIndexTableData = function () {
        $('#data-table').bootstrapTable({
            method: 'get',
            url: '{{ url('admin/permissions') }}',
            toolbar: '#toolbar',
            striped: true, //是否显示行间隔色
            sortable:true,
            dataField: "data",
            pageNumber: 1, //默认第一页
            pagination: true,
            uniqueId:'id',
            queryParamsType: 'limit',//查询参数组织方式
            // queryParams:	function(params) {
            //     return {
            //         page:params.pageNumber,
            //         limit:params.pageSize
            //     };
            // },//请求服务器时所传的参数
            sidePagination: 'server',//指定服务器端分页
            pageSize: 10,
            pageList: [10, 20, 30],
            showRefresh: true,
            showColumns: true,
            search:true,
            clickToSelect: true,//是否启用点击选中行
            toolbarAlign: 'left',//工具栏对齐方式
            buttonsAlign: 'right',//按钮对齐方式
            //toolbar:'#toolbar',//指定工作栏
            showExport: true,
            exportDataType: 'all',
            columns: [
                {checkbox: true},
                {title: 'id', field: 'id', visible: true, sortable: true},
                {title: 'Name', field: 'name', sortable: true},
                {title: 'Guard', field: 'guard_name', sortable: true},
                {title: 'Created At', field: 'created_at', sortable: true},
                {title: 'Updated At', field: 'updated_at', sortable: true},
                {field: 'operate', title: 'Operate', formatter: actionButton}
            ]
        })
    };

    var actionButton = function(value, row, index){
        var deleteButton = '<a href="javascript:;" data-id="'+row.id+'" class="btn btn-danger btn-xs destroy"><i class="fa fa-trash"> Delete</i><form action="{{ url('admin/permissions') }}/'+row.id+'" method="POST" name="delete_item_'+row.id+'" style="display:none">{!! method_field('DELETE').csrf_field() !!}</form></a>';
        return deleteButton;
    };

    var handleDestroy = function(){
        $(document).on('click','.destroy',function(){
            var _delete_id = $(this).attr('data-id');
            swal({
                    title: "您确定要删除这条信息吗",
                    text: "删除后将无法恢复，请谨慎操作！",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                    cancelButtonText: "取消",
                    closeOnConfirm: false
                },
                function () {
                    $('form[name=delete_item_'+_delete_id+']').submit();
                }
            );
        });
    }


    var Permissions = function () {
        "use strict";

        return {
            index:function(){
                handleGritterMessage();
                handleIndexTableData();
                handleDestroy();
            }
        };
    }();
</script>
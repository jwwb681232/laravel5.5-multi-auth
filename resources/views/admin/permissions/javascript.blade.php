/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/29
 * Time: 0:17
 */
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
        return '<button type="button" class="btn btn-default  btn-xs">A权限</button>';
    };


    var Permissions = function () {
        "use strict";

        return {
            index:function(){
                handleGritterMessage();
                handleIndexTableData();
            }
        };
    }();
</script>

<?php if (Auth::guard('employee')->user()->id === $model->created_by || (Auth::guard('employee')->user()->type === 'admin')) { ?>
    <a href ="{{ url('floors/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

<button class="delete btn btn-danger" id={{$id}}><i class="fa fa-trash"></i></button>

<?php } ?>
<script>
$('#{{$id}}').click(function(){
var id=$(this).prop('id');
console.log(id);
if(confirm('are you sure?')){
    console.log("asdassss");
$.ajax({

    url : 'floors/'+id ,
    type : 'delete',
    datatype : 'JSON',
    data : {
        'id' : id,
        '_method' : 'delete',
        '_token' : '{{ csrf_token() }}'

    },
    success : function(data){
        alert(data);
        $('#dataTableBuilder').DataTable().ajax.reload();
        
        // window.location.reload();   
    }

})

}
})
</script>

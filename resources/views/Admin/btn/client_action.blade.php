
<?php if (Auth::guard('employee')->user()->id === $model->approved_by  || (Auth::guard('employee')->user()->type === 'admin')|| (Auth::guard('employee')->user()->type === 'manager')) { ?>
<a href ="{{ url('clients/'.$id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
<form action="{{ url('employees/'.$id) }}" method="post" style="display: inline-block">
{{ csrf_field()}}
{{ method_field('DELETE')}}
<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
</form>
<?php } ?>
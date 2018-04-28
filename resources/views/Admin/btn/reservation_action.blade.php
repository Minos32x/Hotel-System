@if ((Auth::guard('employee')->user()->type ==='manager') || (Auth::guard('employee')->user()->type === 'admin') || (Auth::guard('employee')->user()->id === $model->created_by) )

    <form method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
    <a href ="{{ url('client/reservation/delete/'.$id) }}" class="btn btn-danger" ><i class="fa fa-remove"> Delete</i></a>
    </form>
@endif

{{--Validate on reservations--}}

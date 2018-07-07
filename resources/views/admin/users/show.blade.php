<div class="mt-element-card mt-card-round mt-element-overlay">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <ul class="list-group m-0">
                <li class="list-group-item"><i class="icon-user"></i> <b class="p-r-1">Name:</b> {{$user->name}}</li>
                <li class="list-group-item"><i class="icon-envelope"></i> <b class="p-r-1">Email:</b> {{$user->email}}</li>
                <li class="list-group-item"><img src="/images/icon3.png" alt="" width="18" height="20"> <b class="p-r-1">ETH Address:</b> {{$eth->address}}</li>
            </ul>

            <hr>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Currency</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->history as $item)
                    <tr>
                        <th>{{$item->currency}}</th>
                        <td>{{$item->address}}</td>
                        <td>{{$item->balance}}</td>
                        <td>{{$item->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

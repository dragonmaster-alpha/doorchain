 <!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lists Available for Subscription:</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <!-- <tr>

                                        <th>Lists</th>

                                        <th></th>
                                    </tr> -->
                                </thead>
                                <tbody>
                                    @foreach ($lists as $list)
                                        <tr>
                                            <td>{{$list->list}}</td>
                                            <td>
                                                @if ($list->is_subscribed)
                                                    <a class="btn btn-sm btn-danger" href="{{ route('list.add.subscribe', ['id' => $list->id]) }}">Unsubscribe</a>
                                                @else
                                                    <a class="btn btn-sm btn-success" href="{{ route('list.add.subscribe', ['id' => $list->id]) }}">Subscribe</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

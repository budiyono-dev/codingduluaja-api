<x-layout.main-sidebar title="Resource | User Api">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card mt-3 shadow">
                <div class="card-header d-flex">
                    <h4 class="m-0">Resource User Api</h4>
                    <a class="btn btn-sm btn-primary px-3 mx-3"
                       href="{{ route('res.userApi.pageDummy', absolute:false) }}">Add Dummy
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 70vh">
                        <table class="table table-sm table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <td class="">ID</td>
                                    <td class="">{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <td class="">Name</td>
                                    <td class="">{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <td class="">NIk</td>
                                    <td class="">{{$user->nik}}</td>
                                </tr>
                                <tr>
                                    <td class="">Phone</td>
                                    <td class="">{{$user->phone}}</td>
                                </tr>
                                <tr>
                                    <td class="">Email</td>
                                    <td class="">{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td class="">Address</td>
                                    <td class=""></td>
                                </tr>
                                <tr>
                                    <td class="">Country</td>
                                    <td class="">{{$user->address->country}}</td>
                                </tr>
                                <tr>
                                    <td class="">State</td>
                                    <td class="">{{$user->address->state}}</td>
                                </tr>
                                <tr>
                                    <td class="">City</td>
                                    <td class="">{{$user->address->city}}</td>
                                </tr>
                                <tr>
                                    <td class="">Postal Code</td>
                                    <td class="">{{$user->address->postcode}}</td>
                                </tr>
                                <tr>
                                    <td class="">Detail</td>
                                    <td class="">{{$user->address->detail}}</td>
                                </tr>
                                <tr>
                                    <td class="">Created At</td>
                                    <td class="">{{$user->created_at}}</td>
                                </tr>
                                <tr>
                                    <td class="">Updated At</td>
                                    <td class="">{{$user->updated_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div
</x-layout.main-sidebar>

@extends('admin.master')
@section('main_content')
    <div class="widget">
        <h3 class="section-title first-title"><i class="icon-table"></i> Manage Category</h3>
        <div class="widget-content-white glossed">
            <div class="padded">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                    <tr>
                        <th><div class="checkbox"><input type="checkbox"></div></th>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication Status</th>
                        <th style="display:none">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>


                    @foreach( $emails as $email_number)
                        $overview = imap_fetch_overview($inbox,$email_number,0);

                        {{ dd($overview) }}

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
    </div>
    </div>


@endsection
@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Blog Title</th>
                            <th>Blog Description</th>
                            <th>Blog Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        @foreach($blogs as $blog)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $blog->blog_title }}</td>
                                <td>{{ $blog->blog_description }}</td>
                                <td><img src="{{ asset($blog->blog_image) }}" alt="" width="70" height="60"></td>
                                <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{ url('/view-blog/'.$blog->id) }}" class="btn btn-info btn-xs" title="View Blog">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($blog->publication_status ==1)
                                        <a href="{{ url('/unpublished-blog/'.$blog->id) }}" class="btn btn-success btn-xs" title="Published Blog">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                    @else
                                        <a href="{{ url('/published-blog/'.$blog->id) }}" class="btn btn-warning btn-xs" title="Unpublished Blog">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif

                                    <a href="{{ url('/edit-blog/'.$blog->id) }}" class="btn btn-primary btn-xs" title="Edit Blog">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ url('/delete-blog/'.$blog->id) }}" class="btn btn-danger btn-xs" title="Delete Blog" onclick="return confirm('Are you sure to delete this'); ">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@endsection
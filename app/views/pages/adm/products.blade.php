@extends('layouts.admin')
@section('adminPanel')
    <table class="table table-bordered products">
        <thead>
            <th id="Category">Category (sortable)</th>
            <th id="ProductName">Product Name (sortable)</th>
            <th id="Description">Description (sortable)</th>
            <th id="Piece">Piece</th>
            <th>Price</th>
            <th>Alter / Remove</th>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ App\Category::where('id', $product->category)->first()->cat_name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->small_desc }}</td>
                    <td>{{ $product->piece }}</td>
                    <td>€ {{ $product->price }}</td>
                    <td>
                        <center>
                            <a href="{{ url('admin/products/edit/' . $product->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="{{ url('admin/products/remove/' . $product->id) }}"><span class="glyphicon glyphicon-remove"></span></a>
                        </center>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{ $products->links() }}
    </table>
    <a href="{{ URL::previous() }}" class="btn btn-raised" >Back</a>
    <a href="{{ url('admin/products/add') }}" class="btn btn-raised btn-primary" >New product</a>
    <script>
        $(document).ready(function () {
            var table = $('.products');
            $('#Category, #ProductName, #Description, #Piece')
                .wrapInner('<span title="sort this column"/>')
                .each(function(){
                    var th = $(this),
                        thIndex = th.index(),
                        inverse = false;
                    th.click(function(){
                        table.find('td').filter(function(){
                            return $(this).index() === thIndex;
                        }).sortElements(function(a, b){
                            if( $.text([a]) == $.text([b]) )
                                return 0;
                            return $.text([a]) > $.text([b]) ?
                                inverse ? -1 : 1
                                : inverse ? 1 : -1;
                        }, function(){
                            // parentNode is the element we want to move
                            return this.parentNode; 
                        });
                        inverse = !inverse;
                    });
                });
        });
    </script>
@endsection
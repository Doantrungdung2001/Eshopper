@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    
                    @foreach($edit_brand_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->id)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu sản phẩm</label>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="for-control" id="exampleInputEmail1" placeholder="Tên danh mục sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu sản phẩm</label>
                            <textarea style="resize:none" rows="8" class="form-control" name="brand_product_describe" id="exampleInputPassword1">{{$edit_value->brand_desc}}</textarea>
                        </div>
                        <button type="submit" name="update-brand-product" class="btn btn-info">Cập Nhật</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection
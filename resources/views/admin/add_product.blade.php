@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <?php 
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-arlet">',$message,'</span>';
                            Session::put('message',null);
                        }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="for-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" class="for-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="for-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize:none" rows="8" class="form-control" name="product_describe" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize:none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Dell</option>
                                <option value="1">Samsung</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" name="add-category-product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection
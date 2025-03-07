@extends('layouts.admin')
@section('content')
<?php
if ($action == 'edit') {
    $title = 'In App purchase products';
    $readonly = "";
}
?>
<style>
    .panel-body {
        border-radius: 5px;
        padding-left: 20px;
        padding-bottom: 20px;
        padding-right: 20px;
        padding-top: 20px;
        margin-top: 20px;
        box-shadow: 0 0 5px 1px #a9a9a9;
    }

    .panel-title {
        position: absolute;
        background: white;
        margin-top: -30px;
        padding-left: 10px;
        font-weight: bold;
        padding-right: 10px;
        color: #000;
    }

    label.title {
        color: black;
        font-weight: 500;
        font-size: 15px;
    }

    .custom-btn {
        font-size: 13px;
        padding: 3px 8px 4px 8px;
    }

    .modal {
        margin-top: 50px;
    }

    .card {
        min-height: 450px;
        margin-top: 0px;
    }
</style>

<div class="row">
    <div class="col-md-3">
        @include('includes.admin.settings')
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card customers-profile">
                    <h3><?php echo $title; ?></h3>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">

                                <nav>
                                    <div class="nav nav-tabs" id="myTab" role="tablist">
                                        <button class="nav-link <?php echo ($type == 'C') ? 'active' : ''; ?>" id="captcha_tab" data-bs-toggle="tab" data-bs-target="#captcha_settings" type="button" role="tab" aria-controls="captcha_settings" aria-selected="true" data-type="C"> <i class="fa fa-refresh"></i> In App Purchase Products</button>
                                        <button class="nav-link <?php echo ($type == 'P') ? 'active' : ''; ?>" id="product_tab" data-bs-toggle="tab" data-bs-target="#product_settings" type="button" role="tab" aria-controls="product_settings" aria-selected="true" data-type="P"> <i class="fa fa-gift"></i> Product Settings</button>

                                    </div>
                                </nav>

                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                    <?php Session::forget('success'); ?>
                                </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-bs-dismiss="alert">×</button>
                                    <strong>{!! $message !!}</strong>
                                    <?php Session::forget('error'); ?>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="row"> -->

                        <!-- <div class="row"> -->

                        <div class="row">
                            <div class="tab-content col-md-12" id="myTabContent">
                                <div class="row tab-pane fade show <?php echo ($type == 'C') ? 'active' : ''; ?>" id="captcha_settings" role="tabpanel" aria-labelledby="captcha_setting_tab">
                                    <div class="col-lg-12 col-md-12">
                                        <form role="form" action="{{url( config('app.admin_url') .'/inapp-purchase-products-update')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">In App purchase</label>
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12">
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title ">Products</label>
                                                            <select class="form-control " name="products[]" id="products" multiple required style="width: 100%;">
                                                                <option disabled>Please enter value</option>
                                                                <?php foreach ($inappPurchaseSettings as $product) { ?>
                                                                    <option value="<?php echo $product->title; ?>" selected><?php echo $product->title; ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 mt-3" <?php if ($action == 'view') {
                                                                                    echo "style='display:none'";
                                                                                } ?>>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row tab-pane fade show <?php echo ($type == 'P') ? 'active' : ''; ?>" id="product_settings" role="tabpanel" aria-labelledby="product_setting_tab">
                                    <div class="col-12">
                                        <form role="form" action="{{url( config('app.admin_url') .'/gifts-product-settings-update')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">Purchase Product</label>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <?php
                                                        if (old('purchase_product_name') != '') {
                                                            $purchase_product_name = old('purchase_product_name');
                                                        } else if (isset($giftsProductSettings->purchase_product_name) && $giftsProductSettings->purchase_product_name != '') {
                                                            $purchase_product_name = $giftsProductSettings->purchase_product_name;
                                                        } else {
                                                            $purchase_product_name = '';
                                                        }
                                                        ?>
                                                        <div style="padding-top:25px"></div>
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title nopad">Name</label>
                                                            <input type="text" name="purchase_product_name" class="form-control" value="{{ $purchase_product_name }}">
                                                        </div>

                                                        <div class="col-lg-12 col-md-12">
                                                            <div style="padding-top:15px"></div>
                                                            <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                                <label class="control-label title col-md-3 nopad">Image</label>
                                                                <?php
                                                                if (old('purchase_product_image') != '') {
                                                                    $purchase_product_image = old('purchase_product_image');
                                                                } else if (isset($giftsProductSettings->purchase_product_image) && $giftsProductSettings->purchase_product_image != '') {
                                                                    $purchase_product_image = $giftsProductSettings->purchase_product_image;
                                                                } else {
                                                                    $purchase_product_image = '';
                                                                }
                                                                ?>
                                                                @if($action!='view')
                                                                <input type="file" name="purchase_product_image" class="form-control col-md-6">
                                                                @endif
                                                                <input type="hidden" class="form-control" name="old_purchase_product_image" value="<?php echo $purchase_product_image; ?>" readonly>
                                                                @if($purchase_product_image!="")
                                                                <div class="col-3">
                                                                    <img src="<?php echo asset(Storage::url('public/uploads/' . $purchase_product_image)); ?>" width="130px">
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <!--  -->

                                            <div class="panel-body" style="padding-bottom: 32px;">
                                                <label class="panel-title">Redeem Product</label>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div style="padding-top:25px"></div>
                                                        <?php
                                                        if (old('redeem_product_name') != '') {
                                                            $redeem_product_name = old('redeem_product_name');
                                                        } else if (isset($giftsProductSettings->redeem_product_name) && $giftsProductSettings->redeem_product_name != '') {
                                                            $redeem_product_name = $giftsProductSettings->redeem_product_name;
                                                        } else {
                                                            $redeem_product_name = '';
                                                        }
                                                        ?>
                                                        <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                            <label class="control-label title nopad">Name</label>
                                                            <input type="text" name="redeem_product_name" class="form-control" value="{{ $redeem_product_name }}">
                                                        </div>

                                                        <div class="col-lg-12 col-md-12">
                                                            <div style="padding-top:15px"></div>
                                                            <div class="form-group label-floating is-empty row" style="padding: 0px;margin: 0px;">
                                                                <label class="control-label title col-md-3 nopad">Image</label>
                                                                <?php
                                                                if (old('redeem_product_image') != '') {
                                                                    $redeem_product_image = old('redeem_product_image');
                                                                } else if (isset($giftsProductSettings->redeem_product_image) && $giftsProductSettings->redeem_product_image != '') {
                                                                    $redeem_product_image = $giftsProductSettings->redeem_product_image;
                                                                } else {
                                                                    $redeem_product_image = '';
                                                                }
                                                                ?>
                                                                @if($action!='view')
                                                                <input type="file" name="redeem_product_image" class="form-control col-md-6">
                                                                @endif
                                                                <input type="hidden" class="form-control" name="old_redeem_product_image" value="<?php echo $redeem_product_image; ?>" readonly>
                                                                @if($redeem_product_image!="")
                                                                <div class="col-3">
                                                                    <img src="<?php echo asset(Storage::url('public/uploads/' . $redeem_product_image)); ?>" width="130px">
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 mt-3" <?php if ($action == 'view') {
                                                                                    echo "style='display:none'";
                                                                                } ?>>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style type="text/css">
    .model-settings label.control-label.title {
        margin: 20px;
        font-size: 1.1rem;
    }

    .toggle.btn.btn-sm {
        /*margin-top: 15px;*/
    }

    .toggle-group label.btn.btn-sm {
        padding-top: 4px !important;
        line-height: 105%;
    }

    .cloak {
        /*pointer-events: none;*/
        opacity: 0.3;
    }

    .nopad {
        padding: 0px;
    }
</style>
<script type="text/javascript">
    $(function() {
        $('.nav-link').on('click', function() {
            var val = $(this).attr("data-type");
            $('#setting_type').val(val);
        });
    });

    $('#products').select2({
        tags: true,
        minimumInputLength: 1
    });
</script>
@endsection
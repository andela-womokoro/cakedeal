@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-sm-9">
    @if(isset($message))
        <div class="row">
              <div class="col-md-12">
                  <div class="alert alert-info" role="alert">
                      {{ $message }}
                  </div>
              </div>
        </div>
  @endif
        <!-- Cake order form -->
        <div class="form-container">
          <h2>Make a Cake Order</h2>
            <form method="post" action="/make-order/{{ $order->id }}">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Quantity" name="quantity" value=""  maxlength="5" required style="width:100px;">
                </div>
                <div class="form-group">
                  <textarea rows="50" cols="" class="form-control" placeholder="Message (Optional)" name="message" value=""  maxlength="255"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="delivery-date" class="form-control" required placeholder="Delivery Date" style="width: 170px;" onfocus="(this.type='date')" onfocusout="(this.type='text')">
                </div>
                <button type="submit" class="btn btn-default">Place Order</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>

    </div>
</div>
</div>
@endsection

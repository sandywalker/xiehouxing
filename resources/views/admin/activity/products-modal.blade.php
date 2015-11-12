
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">从选择产品</h4>
      </div>
      <div class="modal-body">
          @foreach($products as $product)
          <div class="media" data-id="{{$product->id}}">
            <div class="media-left">
              <a href="#">
                <img class="media-object thumb-sm" src="{{asset($product->thumb)}}" alt="...">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">{{$product->title}}</h4>
              <p>{{$product->description}}</p>
            </div>
          </div>
          @endforeach
          <p>&nbsp;</p>
          <div class="form-group">
            <label for="startTime">活动时间：</label>
            <input type="date" class="form-control" id="startTime" value="{{$startTime}}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">添加活动</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

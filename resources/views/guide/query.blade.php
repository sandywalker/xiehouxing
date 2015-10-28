<section class="container guide-search">
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <form action="/guides/list" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" name="types" value="">
                                <input type="text" name="key" class="form-control input-lg" value="{{$key or ''}}"  placeholder="输入想去的地方...">
                                  <span class="input-group-btn">
                                    <button class="btn btn-lg btn-default btn-info" type="submit" ><i class="glyphicon glyphicon-search"></i></button>
                                  </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
</section>
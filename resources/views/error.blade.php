@if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>抱歉!</strong> 输入出了点问题.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
@endif
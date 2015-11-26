  @if ($states == 0)
		<span class="text-info">报名中</span>
  @elseif ($states == 1)
		<span class="text-success">已开始</span>
  @elseif ($states == 2)
  		<span class="text-primary">已结束</span>
  @elseif ($states == 100)
  		<span class="text-danger">取消</span>
  @endif

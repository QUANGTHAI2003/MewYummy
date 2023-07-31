@if (auth()->check())
  <section class="comment-section comment">
    <div class="comment__input">
      <livewire:client.comments.comment-count :commentCount="$product->comments_count">
      <div class="comment__box">

        <div class="comment__box-avatar">
          <img src="{{ avatarUrl(auth()->user()) }}" alt="{{ auth()->user()->name }}">
        </div>
        <div class="comment__box-input">
          <input type="text" wire:model.defer="comment" class="input-main" placeholder="Viết bình luận...">
          <span class="focus-border"></span>
          <button type="submit" class="btn btn-primary btnSend" wire:click="sendComment">Gửi</button>
          <!-- <div class="buttons"></div><button class="cancel-button">Hủy</button><button class="send-button">Gửi</button></div> -->
        </div>
      </div>
    </div>
    @foreach ($comments as $comment)
      <div class="comment__content">
        <div class="comment__content-item mb-3">
          <div class="comment__main">
            <div class="comment__main-content">
              <div class="author-thumbnail">
                <img src="{{ avatarUrl($comment->user) }}" alt="avatar">
              </div>
              <div class="content__main">
                <div class="author-name">
                  <span>{{ $comment->user->name }}</span>
                  <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <div class="content">
                  <p>{{ $comment->content }}</p>
                </div>
                <div class="content__main-reaction">
                  <div class="reaction">
                    <i class="fa-solid fa-thumbs-up icon"></i>
                    <span>Thích</span>
                  </div>
                  {{-- <livewire:client.comments.comment-like :likeCount="$comment->like_count"> --}}
                  <div class="reaction btnResParent" data-parent-id="{{ $comment->id }}">
                    <i class="fa-solid fa-comment icon"></i>
                    <span>Trả lời</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="comment__box reply hide comment-parent-{{ $comment->id }}">
            <div class="comment__box-avatar">
              <img src="{{ avatarUrl(auth()->user()) }}" alt="avatar">
            </div>
            <div class="comment__box-input">
              <input type="text" wire:model.defer="commentChild" class="input-main comment-input-{{ $comment->id }}" id="commentMain"
                placeholder="Viết bình luận...">
              <button type="submit" class="btn btn-primary btnSendReply" data-comment="{{ $comment->id }}"
                data-comment-id="{{ $comment->id }}" wire:click.prevent="sendCommentChild({{ $comment->id }})">Gửi</button>
            </div>
          </div>
          @foreach ($comment->replies as $reply)
            <div class="comment__replies">
              <div class="author-thumbnail">
                <img src="{{ avatarUrl($reply->user) }}" alt="{{ $comment->user->name }}">
              </div>
              <div class="content__main">
                <div class="author-name">
                  <span>{{ $reply->user->name }}</span>
                  <span class="time">{{ $reply->created_at->diffForHumans() }}</span>
                </div>
                <div class="content">
                  <p>{!! $reply->content !!}</p>
                </div>
                <div class="content__main-reaction">
                  <div class="reaction">
                    <i class="fa-solid fa-thumbs-up icon"></i>
                    <span>Thích</span>
                  </div>
                  <div class="reaction btnRes" data-id="{{ $reply->id }}">
                    <i class="fa-solid fa-comment icon"></i>
                    <span>Trả lời</span>
                  </div>
                </div>
              </div>
            </div>
            @auth
              <div class="comment__box reply hide comment-child comment-{{ $reply->id }}">
                <div class="comment__box-avatar">
                  <img src="{{ avatarUrl(auth()->user()) }}" alt="avatar">
                </div>
                <div class="comment__box-input">
                  <input type="text" wire:model.defer="commentChildChild" class="input-main comment-input-{{ $reply->id }}" id="commentMain"
                    placeholder="Viết bình luận...">
                  <button type="submit" wire:click.prevent="sendCommentChildChild({{ $comment->id }})" class="btn btn-primary btnSendReply" data-comment="{{ $reply->id }}"
                    data-comment-id="{{ $comment->id }}">Gửi</button>
                </div>
              </div>
            @endauth
          @endforeach
        </div>
      </div>
    @endforeach
    {{ $comments->links('livewire.client-pagination') }}
  </section>
@else
  <div class="alert alert-warning mb-4">
    Bạn phải <a class="login-comment" href="{{ route('login') }}">Đăng nhập</a>
    hoặc <a class="login-comment" href="{{ route('register') }}">Tạo tài khoản</a> để bình luận
  </div>
@endif

@push('scripts')
  <script>
    $('.btnRes').each(function() {
      $(this).on('click', function(e) {
        e.preventDefault();
        const dataId = $(this).attr('data-id');
        console.log(dataId);
        $('.comment-' + dataId).toggleClass('hide');
      })
    })

    $('.btnResParent').each(function() {
      $(this).on('click', function(e) {
        console.log('ok');
        const dataId = $(this).attr('data-parent-id');
        console.log(dataId);
        $('.comment-parent-' + dataId).toggleClass('hide');
      })
    })
  </script>
@endpush
{{-- @push('scripts')
  <script>
    // showCommentBox event
    document.addEventListener("showCommentBox", function(e) {
      e.preventDefault();
        $('.comment-parent-' + e.detail.id).toggleClass('hide');
    })
  </script>
@endpush --}}

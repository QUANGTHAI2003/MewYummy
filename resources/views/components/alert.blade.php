<div id="toast"></div>
@if (session()->has('success'))
  <div class="toast">
    <div class="toast-content">
      <i class="fas fa-solid fa-check check"></i>

      <div class="message">
        <span class="text text-1">Thành công</span>
        <span class="text text-2">
          {{ Session::get('success') }}
        </span>
      </div>
    </div>
    <i class="fa-solid fa-xmark close"></i>

    <div class="progress"></div>
  </div>
  @push('scripts')
    <script>
      const toast = document.querySelector(".toast")
      closeIcon = document.querySelector(".close"),
        progress = document.querySelector(".progress");

      let timer1, timer2;

      toast.classList.add("active");
      progress.classList.add("active");

      timer1 = setTimeout(() => {
        toast.classList.remove("active");
      }, 5000); //1s = 1000 milliseconds

      timer2 = setTimeout(() => {
        // progress.classList.remove("active");
      }, 5300);

      closeIcon.addEventListener("click", () => {
        toast.classList.remove("active");

        setTimeout(() => {
          progress.classList.remove("active");
        }, 300000);

        clearTimeout(timer1);
        clearTimeout(timer2);
      });
    </script>
  @endpush
@endif
@if (session()->has('error'))
  <div class="toast error">
    <div class="toast-content">
      <i class="fa-solid fa-exclamation check error"></i>

      <div class="message">
        <span class="text text-1">Đã xảy ra lỗi</span>
        <span class="text text-2">
          {{ Session::get('error') }}
        </span>
      </div>
    </div>
    <i class="fa-solid fa-xmark close"></i>

    <div class="progress error"></div>
  </div>
  @push('scripts')
    <script>
      const toast = document.querySelector(".toast")
      closeIcon = document.querySelector(".close"),
        progress = document.querySelector(".progress");

      let timer1, timer2;

      toast.classList.add("active");
      progress.classList.add("active");

      timer1 = setTimeout(() => {
        toast.classList.remove("active");
      }, 5000); //1s = 1000 milliseconds

      timer2 = setTimeout(() => {
        // progress.classList.remove("active");
      }, 5300);

      closeIcon.addEventListener("click", () => {
        toast.classList.remove("active");

        setTimeout(() => {
          progress.classList.remove("active");
        }, 300000);

        clearTimeout(timer1);
        clearTimeout(timer2);
      });
    </script>
  @endpush
@endif

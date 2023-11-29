<!-- JQuery min js -->

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        var header = $(".main-header");
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                header.addClass("solid");
            } else {
                header.removeClass("solid");
            }
        });
    });
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- Bootstrap Bundle js -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!--Internal  Chart.bundle js -->
<script src="{{ asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Moment js -->
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>

<!--Internal Sparkline js -->
<script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Moment js -->
<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

<!--Internal Apexchart js-->
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

<!-- Eva-icons js -->
<script src="{{ asset('assets/js/eva-icons.min.js') }}"></script>

<!-- right-sidebar js -->
<script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
<script src="{{ asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>

<!-- Sticky js -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>
<script src="{{ asset('assets/js/modal-popup.js') }}"></script>

<!-- Left-menu js-->
<script src="{{ asset('assets/plugins/side-menu/sidemenu.js') }}"></script>

<!-- Internal Map -->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

<!--Internal  index js -->
<script src="{{ asset('assets/js/index.js') }}"></script>

<!--themecolor js-->
<script src="{{ asset('assets/js/themecolor.js') }}"></script>

<!-- Apexchart js-->
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

<!-- custom js -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- switcher-styles js -->
<script src="{{ asset('assets/js/swither-styles.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('script')

<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar").style.top = "0";
    } else {
      document.getElementById("navbar").style.top = "-100px";
    }
    prevScrollpos = currentScrollPos;
  }
</script>
<script>
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif
</script>

<script>
    // Ketika dokumen selesai dimuat
document.addEventListener("DOMContentLoaded", function() {
  var backToTopButton = document.getElementById("back-to-top");
  var scrollTimeout;

  // Tambahkan event listener saat pengguna menggulir
  window.addEventListener("scroll", function() {
    // Tampilkan tombol ketika pengguna telah menggulir lebih dari 100 piksel
    backToTopButton.style.display = "block";

    // Hapus penundaan sebelumnya (jika ada)
    clearTimeout(scrollTimeout);

    // Atur penundaan untuk menghilangkan tombol setelah 3 detik
    scrollTimeout = setTimeout(function() {
      backToTopButton.style.display = "none";
    }, 3000); // Ubah angka 3000 menjadi waktu yang Anda inginkan dalam milidetik
  });

  // Tambahkan event listener untuk kembali ke atas ketika tombol diklik
  backToTopButton.addEventListener("click", function() {
    window.scrollTo({
      top: 0,
      behavior: "smooth" // Untuk efek scroll yang halus
    });
  });
});

</script>

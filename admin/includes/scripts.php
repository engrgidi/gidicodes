<script src="js/jquery-3.3.1.min.js"></script>
  
  <script src="js/moment.min.js"></script>

  <script src="js/Chart.min.js"></script>
  <script src="../css/bootstrap-5.1.0-dist/bootstrap-5.1.0-dist/js/bootstrap.js"></script>

  <script src="js/bootstrap.min.js"></script>
 
  <script src="js/tooplate-scripts.js"></script>
  <script>
      Chart.defaults.global.defaultFontColor = 'white';
      let ctxLine,
          ctxBar,
          ctxPie,
          optionsLine,
          optionsBar,
          optionsPie,
          configLine,
          configBar,
          configPie,
          lineChart;
      barChart, pieChart;
      // DOM is ready
      $(function () {
          drawLineChart(); // Line Chart
          drawBarChart(); // Bar Chart
          drawPieChart(); // Pie Chart

          $(window).resize(function () {
              updateLineChart();
              updateBarChart();                
          });
      })
  </script>
</body>

</html>
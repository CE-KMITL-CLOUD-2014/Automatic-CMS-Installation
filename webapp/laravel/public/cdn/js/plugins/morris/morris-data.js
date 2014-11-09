// Morris.js Charts sample data for SB Admin template

$(function() {

	//Color for Area Chart
	//lineColors: ['#16a085'],//GREEN SEA color
	//lineColors: ['#27ae60'],//NEPHRITIS color
	//lineColors: ['#2980b9'],//BELIZE HOLE color
	//lineColors: ['#8e44ad'],//WISTERIA color
	//lineColors: ['#2c3e50'],//MIDNIGHT BLUE color
	//lineColors: ['#f39c12'],//ORANGE color
	//lineColors: ['#d35400'],//PUMPKIN color
	//lineColors: ['#c0392b'],//POMEGRANATE color
	//lineColors: ['#bdc3c7'],//SILVER color
	//lineColors: ['#7f8c8d'],//ASBESTOS color

    // Area Chart - Web site 1
	// Web site 1 - Month
    Morris.Area({
        element: 'morris-website1-pageviews-month-chart',
        data: [{
            period: '2014-01',
            pageviews: 2666
        }, {
            period: '2014-02',
            pageviews: 2778
        }, {
            period: '2014-03',
            pageviews: 4912
        }, {
            period: '2014-04',
            pageviews: 3767
        }, {
            period: '2014-05',
            pageviews: 6810
        }, {
            period: '2014-06',
            pageviews: 5670
        }, {
            period: '2014-07',
            pageviews: 4820
        }, {
            period: '2014-08',
            pageviews: 15073
        }, {
            period: '2014-09',
            pageviews: 10687
        }, {
            period: '2014-10',
            pageviews: 8432
        }],
        xkey: 'period',
        ykeys: ['pageviews'],
        labels: ['Pageviews'],
        pointSize: 2,
        hideHover: 'auto',
		lineColors: ['#2980b9'],//BELIZE HOLE color
        resize: true
    });

	// Web site 1 - week
	Morris.Area({
        element: 'morris-website1-pageviews-week-chart',
        data: [{
            period: '2014-08-24',
            pageviews: 200
        }, {
            period: '2014-08-31',
            pageviews: 700
        }, {
            period: '2014-09-7',
            pageviews: 900
        }, {
            period: '2014-09-14',
            pageviews: 300
        }, {
            period: '2014-09-21',
            pageviews: 622
        }, {
            period: '2014-09-28',
            pageviews: 100
        }, {
            period: '2014-10-5',
            pageviews: 521
        }, {
            period: '2014-10-12',
            pageviews: 1000
        }, {
            period: '2014-10-19',
            pageviews: 312
        }, {
            period: '2014-10-26',
            pageviews: 426
        }],
        xkey: 'period',
        ykeys: ['pageviews'],
        labels: ['Pageviews'],
        pointSize: 2,
        hideHover: 'auto',
		lineColors: ['#2980b9'],//BELIZE HOLE color
        resize: true
    });

	// Web site 1 - day
	Morris.Area({
        element: 'morris-website1-pageviews-day-chart',
        data: [{
            period: '2014-10-17',
            pageviews: 543
        }, {
            period: '2014-10-18',
            pageviews: 645
        }, {
            period: '2014-10-19',
            pageviews: 742
        }, {
            period: '2014-10-20',
            pageviews: 515
        }, {
            period: '2014-10-21',
            pageviews: 751
        }, {
            period: '2014-10-22',
            pageviews: 654
        }, {
            period: '2014-10-23',
            pageviews: 521
        }, {
            period: '2014-10-24',
            pageviews: 800
        }, {
            period: '2014-10-25',
            pageviews: 456
        }, {
            period: '2014-10-26',
            pageviews: 426
        }],
        xkey: 'period',
        ykeys: ['pageviews'],
        labels: ['Pageviews'],
        pointSize: 2,
        hideHover: 'auto',
		lineColors: ['#2980b9'],//BELIZE HOLE color
        resize: true
    });

	// Web site 1 - hourly
	Morris.Area({
        element: 'morris-website1-pageviews-hourly-chart',
        data: [{
            period: '2014-10-26 10:00',
            pageviews: 200
        }, {
            period: '2014-10-26 11:00',
            pageviews: 300
        }, {
            period: '2014-10-26 12:00',
            pageviews: 295
        }, {
            period: '2014-10-26 13:00',
            pageviews: 400
        }, {
            period: '2014-10-26 14:00',
            pageviews: 534
        }, {
            period: '2014-10-26 15:00',
            pageviews: 654
        }, {
            period: '2014-10-26 16:00',
            pageviews: 753
        }, {
            period: '2014-10-26 17:00',
            pageviews: 765
        }, {
            period: '2014-10-26 18:00',
            pageviews: 812
        }, {
            period: '2014-10-26 19:00',
            pageviews: 900
        }],
        xkey: 'period',
        ykeys: ['pageviews'],
        labels: ['Pageviews'],
        pointSize: 2,
        hideHover: 'auto',
		lineColors: ['#2980b9'],//BELIZE HOLE color
        resize: true
    });

	// Area Chart - Web site 2
    Morris.Area({
        element: 'morris-website2-pageviews-chart',
        data: [{
            period: '2014-01',
            pageviews: 4561
        }, {
            period: '2014-02',
            pageviews: 5345
        }, {
            period: '2014-03',
            pageviews: 6432
        }, {
            period: '2014-04',
            pageviews: 3654
        }, {
            period: '2014-05',
            pageviews: 5413
        }, {
            period: '2014-06',
            pageviews: 5670
        }, {
            period: '2014-07',
            pageviews: 6451
        }, {
            period: '2014-08',
            pageviews: 7542
        }, {
            period: '2014-09',
            pageviews: 10687
        }, {
            period: '2014-10',
            pageviews: 12000
        }],
        xkey: 'period',
        ykeys: ['pageviews'],
        labels: ['Pageviews'],
        pointSize: 2,
        hideHover: 'auto',
		lineColors: ['#16a085'],//GREEN SEA color
        resize: true
    });

	// Area Chart - Web site 3
    Morris.Area({
        element: 'morris-website3-pageviews-chart',
        data: [{
            period: '2014-01',
            pageviews: 12300
        }, {
            period: '2014-02',
            pageviews: 8445
        }, {
            period: '2014-03',
            pageviews: 11000
        }, {
            period: '2014-04',
            pageviews: 7412
        }, {
            period: '2014-05',
            pageviews: 2100
        }, {
            period: '2014-06',
            pageviews: 5000
        }, {
            period: '2014-07',
            pageviews: 7511
        }, {
            period: '2014-08',
            pageviews: 3415
        }, {
            period: '2014-09',
            pageviews: 10687
        }, {
            period: '2014-10',
            pageviews: 5004
        }],
        xkey: 'period',
        ykeys: ['pageviews'],
        labels: ['Pageviews'],
        pointSize: 2,
        hideHover: 'auto',
		lineColors: ['#f39c12'],//ORANGE color
        resize: true
    });
	
	// set 2 color for Donut Chart, Random color of donut chart math with area chart
	//colors: ['#1abc9c','#16a085'],//TURQUOISE, GREEN SEA color
	//colors: ['#2ecc71','#27ae60'],//EMERALD, NEPHRITIS color
	//colors: ['#2980b9','#3498db'],//BELIZE HOLE, PETER RIVER color
	//colors: ['#9b59b6','#8e44ad'],//AMETHYST, WISTERIA color
	//colors: ['#34495e','#2c3e50'],//WET ASPHALT, MIDNIGHT BLUE color
	//colors: ['#f1c40f','#f39c12'],//SUN FLOWER, ORANGE color
	//colors: ['#e67e22','#d35400'],//CARROT, PUMPKIN color
	//colors: ['#e74c3c','#c0392b'],//ALIZARIN, POMEGRANATE color


    // Donut Chart - Example
    Morris.Donut({
        element: 'morris-website1-donut-chart',
        data: [{
            label: "New Visitor",
            value: 253
        }, {
            label: "Returning Visitor",
            value: 132
        }],
		colors: ['#2980b9','#3498db'],//BELIZE HOLE, PETER RIVER color
        resize: true
    });

	// Donut Chart - Example
    Morris.Donut({
        element: 'morris-website2-donut-chart',
        data: [{
            label: "New Visitor",
            value: 892
        }, {
            label: "Returning Visitor",
            value: 756
        }],
		colors: ['#2ecc71','#27ae60'],//EMERALD, NEPHRITIS color
        resize: true
    });

	// Donut Chart - Example
    Morris.Donut({
        element: 'morris-website3-donut-chart',
        data: [{
            label: "New Visitor",
            value: 6541
        }, {
            label: "Returning Visitor",
            value: 2500
        }],
		colors: ['#f1c40f','#f39c12'],//SUN FLOWER, ORANGE color
        resize: true
    });

    // Line Chart - Example
    Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'morris-line-chart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [{
            d: '2012-10-01',
            visits: 802
        }, {
            d: '2012-10-02',
            visits: 783
        }, {
            d: '2012-10-03',
            visits: 820
        }, {
            d: '2012-10-04',
            visits: 839
        }, {
            d: '2012-10-05',
            visits: 792
        }, {
            d: '2012-10-06',
            visits: 859
        }, {
            d: '2012-10-07',
            visits: 790
        }, {
            d: '2012-10-08',
            visits: 1680
        }, {
            d: '2012-10-09',
            visits: 1592
        }, {
            d: '2012-10-10',
            visits: 1420
        }, {
            d: '2012-10-11',
            visits: 882
        }, {
            d: '2012-10-12',
            visits: 889
        }, {
            d: '2012-10-13',
            visits: 819
        }, {
            d: '2012-10-14',
            visits: 849
        }, {
            d: '2012-10-15',
            visits: 870
        }, {
            d: '2012-10-16',
            visits: 1063
        }, {
            d: '2012-10-17',
            visits: 1192
        }, {
            d: '2012-10-18',
            visits: 1224
        }, {
            d: '2012-10-19',
            visits: 1329
        }, {
            d: '2012-10-20',
            visits: 1329
        }, {
            d: '2012-10-21',
            visits: 1239
        }, {
            d: '2012-10-22',
            visits: 1190
        }, {
            d: '2012-10-23',
            visits: 1312
        }, {
            d: '2012-10-24',
            visits: 1293
        }, {
            d: '2012-10-25',
            visits: 1283
        }, {
            d: '2012-10-26',
            visits: 1248
        }, {
            d: '2012-10-27',
            visits: 1323
        }, {
            d: '2012-10-28',
            visits: 1390
        }, {
            d: '2012-10-29',
            visits: 1420
        }, {
            d: '2012-10-30',
            visits: 1529
        }, {
            d: '2012-10-31',
            visits: 1892
        }, ],
        // The name of the data record attribute that contains x-visitss.
        xkey: 'd',
        // A list of names of data record attributes that contain y-visitss.
        ykeys: ['visits'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Visits'],
        // Disables line smoothing
        smooth: false,
        resize: true
    });

    // Bar Chart - Example
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            device: 'iPhone',
            geekbench: 136
        }, {
            device: 'iPhone 3G',
            geekbench: 137
        }, {
            device: 'iPhone 3GS',
            geekbench: 275
        }, {
            device: 'iPhone 4',
            geekbench: 380
        }, {
            device: 'iPhone 4S',
            geekbench: 655
        }, {
            device: 'iPhone 5',
            geekbench: 1571
        }],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });


});

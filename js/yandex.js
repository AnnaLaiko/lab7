ymaps.ready(init);

function init() {
    var geolocation = ymaps.geolocation;
    var coords = [geolocation.latitude, geolocation.longitude];
    var myMap = new ymaps.Map("map", {

        center: [48.644195, 44.418921],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 16,
        // Элементы управления
        // https://tech.yandex.ru/maps/doc/jsapi/2.1/dg/concepts/controls/standard-docpage/
        controls: [
            'zoomControl', // Ползунок масштаба
        ]
    });

    // Добавление метки
    // https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/Placemark-docpage/
    var myPlacemark = new ymaps.Placemark([48.644195, 44.418921], {}, {
        'preset': 'islands#greenCircleDotIcon'
    });

    myMap.geoObjects.add(myPlacemark);

        // Определяем координаты вершин ломаных, определяющих внешнюю и внутренние границы многоугольника
    var width05 = 350 / 2;

    var startPoint = myPlacemark.geometry.getCoordinates(),


        // Вверх от центра на 250 метров
        azimuthT = 1.570796, //вверх
        directionT = [Math.sin(azimuthT), Math.cos(azimuthT)],
        topPoint = ymaps.coordSystem.geo.solveDirectProblem(startPoint, directionT, width05).endPoint,

        // Влево на 250 метров (координаты левой верхней вершины)
        azimuthTL = 3.141593, // влево
        directionTL = [Math.sin(azimuthTL), Math.cos(azimuthTL)],
        topLeftPoint = ymaps.coordSystem.geo.solveDirectProblem(topPoint, directionTL, width05).endPoint,

        // Вправо на 250 метров (координаты правой верхней вершины)
        azimuthTR = 0, // вправо
        directionTR = [Math.sin(azimuthTR), Math.cos(azimuthTR)],
        topRightPoint = ymaps.coordSystem.geo.solveDirectProblem(topPoint, directionTR, width05).endPoint,

        // Вниз от центра на 250 метров
        azimuthB = -1.570796, // вниз
        directionB = [Math.sin(azimuthB), Math.cos(azimuthB)],
        bottomPoint = ymaps.coordSystem.geo.solveDirectProblem(startPoint, directionB, width05).endPoint,

        // Влево на 250 метров (координаты левой нижней вершины)
        azimuthBL = 3.141593, // влево
        directionBL = [Math.sin(azimuthBL), Math.cos(azimuthBL)],
        bottomLeftPoint = ymaps.coordSystem.geo.solveDirectProblem(bottomPoint, directionBL, width05).endPoint,

        // Вправо на 250 метров (координаты правой нижней вершины)
        azimuthBR = 0, // вправо
        directionBR = [Math.sin(azimuthBR), Math.cos(azimuthBR)],
        bottomRightPoint = ymaps.coordSystem.geo.solveDirectProblem(bottomPoint, directionBR, width05).endPoint;


    // Рисуем полигон
    var myPolygon = new ymaps.Polygon([
        // Координаты внешнего контура
        [
            topLeftPoint,
            topRightPoint,
            bottomRightPoint,
            bottomLeftPoint,
            topLeftPoint,
        ],
        [] // Координаты внутреннего контура
    ], {}, {
        // Курсор в режиме добавления новых вершин.
        editorDrawingCursor: "crosshair",
        // Максимально допустимое количество вершин.
        editorMaxPoints: 10,
        fill: true, // Наличие заливки
        fillColor: '0066ff99', // Цвет заливки.
        strokeColor: '0000FF', // Цвет обводки.
        strokeWidth: 5, // Ширина обводки.

        // Убираем возможность добавлять внутренний контур в режиме редактирования
        editorMenuManager: function (t) {
            return t.filter(function (t) {
                return "addInterior" !== t.id
            });
        }
    });

    myMap.geoObjects.add(myPolygon);

    // Включаем режим редактирования полигона
    $('#startDrawing').on('click', function () {
        myPolygon.editor.startDrawing();
    });

    // Отключаем режим редактирования полигона
    $('#stopDrawing').on('click', function () {
        myPolygon.editor.stopDrawing();
        myPolygon.editor.stopEditing();
    });

    // Определяем площадь полигона
    // Для расчета площади используется модуль mapsapi-area
    ymaps.ready(['util.calculateArea']).then(function () {

        $('#calculateArea').on('click', function() {

            // Вычисляем площадь геообъекта.
            var area = Math.round(ymaps.util.calculateArea(myPolygon));

            // Если площадь превышает 1 000 000 м², то приводим ее к км².
            if (area <= 1e6) {
                area += ' м²';
            } else {
                area = (area / 1e6).toFixed(3) + ' км²';
            }

            alert('Площадь полигона ' + area);
        });

    });
}
<!doctype html>
<html lang="en" class="h-100" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jquery-bs-calendar demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--suppress CssUnusedSymbol -->
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>

        
        <div class="row d-flex">
            <div class="align-items-center">

                <div class="row">
                    <div class="dropdown-center">
                        <div class="dropdown-menu p-0">
                            <div data-bs-toggle="calendar" id="calendar_dropdown"></div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div data-bs-toggle="calendar" id="calendar_inline" class="col shadow rounded"></div>
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--<script src="../vendor/webcito/js-date-extensions/dist/js-date-extensions.js"></script>-->
    <script src="../js/jquery.bs.calendar.js"></script>
    <script>
        $(document).ready(function() {
            $.bsCalendar.setDefaults({
                locale: 'en-US',
                url: 'events.json',
                classes: {
                    tableData: {
                        notInMonth: 'text-muted fw-small border-0 opacity-25',
                    }
                },
            })
            $.bsCalendar.setDefault('width', 5000);

            $('#calendar_dropdown').bsCalendar({
                width: 300
            });
            $('#calendar_inline').bsCalendar({
                locale: 'en-US',
                width: '400px',
                classes: {
                    table: 'table tables-sm table-success',
                    tableHeaderCell: 'text-muted fw-lighter',
                    tableHeaderCellActive: 'text-success fw-bold',
                    tableData: {
                        all: 'rounded-circle w-100 h-100 border border-2',
                        today: 'border-success border-4',
                        hover: 'opacity-75',
                        active: 'border-secondary',
                        inMonth: 'fw-bold cursor-pointer',
                        notInMonth: 'text-muted fw-small border-0 opacity-25',
                        eventCounter: 'start-50 bottom-0 translate-middle-x text-bg-danger rounded-pill'
                    }
                },
                event: {
                    formatter(event) {
                        return `
                    <div class="d-flex flex-column">
                        <strong>${event.title}</strong>
                        <small>duration: ${JSON.stringify(event.duration)}</small>
                    </div>
                `;
                    },
                    events: {
                        'click .btn-example'(e, event) {
                            e.preventDefault();
                            alert(JSON.stringify(event));
                        }
                    }
                },
                url(data) {
                    return $.getJSON('events.json').then(json => {
                        // Convert the given from and to dates into JavaScript Date objects
                        let fromDate = new Date(data.from);
                        let toDate = new Date(data.to);
                        // Calculate the difference in milliseconds between the from and to dates
                        let diffInTime = toDate.getTime() - fromDate.getTime();
                        // Iterate over each event in the JSON array
                        json.forEach(event => {
                            // Generate a random time within the specified from and to date range
                            let randomTime = fromDate.getTime() + Math.random() * diffInTime;
                            let randomDate = new Date(randomTime); // 30 minutes in milliseconds
                            // Define the minimum and maximum durations in milliseconds
                            let minDuration = 30 * 60 * 1000;
                            let maxDuration = 2 * 24 * 60 * 60 * 1000; // 2 days in milliseconds
                            // Calculate a random duration between 30 minutes and 2 days
                            let randomDuration = Math.random() * (maxDuration - minDuration) + minDuration;
                            // Assign the random start time to the event
                            event.start = randomDate.toISOString();
                            // Calculate the end time by adding the random duration to the start time
                            event.end = new Date(randomDate.getTime() + randomDuration).toISOString();
                            // Calculate and assign the duration of the event
                            event.duration = calculateDuration(event.start, event.end);
                        });
                        // Return the modified JSON array
                        return json;
                    });
                }
            });

            /**
             * Calculates the duration between two dates in days, hours, minutes, and seconds.
             *
             * @param {string|number|Date} start - The start date and time.
             * @param {string|number|Date} end - The end date and time.
             *
             * @return {Object} - The duration between the two dates in days, hours, minutes, and seconds.
             *                   The returned object has the following properties:
             *                   - days: The number of days.
             *                   - hours: The number of hours.
             *                   - minutes: The number of minutes.
             *                   - seconds: The number of seconds.
             */
            function calculateDuration(start, end) {
                const startDate = new Date(start);
                const endDate = new Date(end);

                // Differenz in Millisekunden
                const diffMs = endDate - startDate;

                // Umwandlung in verschiedene Zeitmaßeinheiten
                const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
                const diffHrs = Math.floor((diffMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const diffMins = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
                const diffSecs = Math.floor((diffMs % (1000 * 60)) / 1000);

                return {
                    days: diffDays,
                    hours: diffHrs,
                    minutes: diffMins,
                    seconds: diffSecs
                };
            }

            $('#calendar_offcanvas').bsCalendar({
                width: '80%'
            });
            $('#calendar_navbar').bsCalendar({
                width: 300
            });

            $('#floatingSelect').on('change', function() {
                $('#calendar_inline').bsCalendar('updateOptions', {
                    locale: $(this).val()
                });
            });

            $('#flexSwitchTheme').on('change', function(e) {
                const theme = $(e.currentTarget).is(':checked') ? 'dark' : 'light';
                $('html').attr('data-bs-theme', theme)
                $('#calendar_inline').bsCalendar('refresh');
            });
        });
    </script>
</body>

</html>
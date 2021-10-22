var route = "{{ url('bookingstart') }}";
// console.log('start');
        $('#pickup').typeahead({
            source: function (query, process) { 
                return $.get('bookingstart', {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });

// var route = "{{ url('bookingend') }}";
// console.log('end');
$('#drop').typeahead({
    source: function (query, process) {
        return $.get('bookingend',
         {
            'query': query
        }, 
        function (data) 
        {             
            return process(data);
        });
    }
});

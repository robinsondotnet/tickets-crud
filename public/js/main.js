Vue.component('tickets', {
    template: "#tickets-template",

    data: function() {
        return {
            tickets: []
        };
    },

    created: function() {
        this.fetchTickets();
    },

    methods: {
        searchTickets: function() {
            let query =  $('#search_text').val();
            $.getJSON('tickets?type=search&query=' + query,
                       function(tickets) {
                           this.tickets = tickets;
                           $('#priority_filter').val('');
                       }.bind(this));
        },

        filterTickets: function() {
            let query =  $('#priority_filter').val();
            $.getJSON('tickets?type=filter&query=' + query,
                       function(tickets) {
                           this.tickets = tickets;
                       }.bind(this));
        },

        fetchTickets: function() {
            $.getJSON('tickets', function(tickets) {
                this.tickets = tickets;
            }.bind(this));
        }
    }
});

new Vue({
    el: 'body'
});

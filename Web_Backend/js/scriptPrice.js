new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN' : document.querySelector('#token').getAttribute('value')
        }
    },

    el: '#PriceController',
    data: { newPrice: {
                typename: '',
                count: '',
                price: ''
		    },
            vdata: [],
            success: false,
            msg: '',
            isErrorTypeName: false,
            isErrorCount: false,
            isErrorPrice: false,
    },

    mounted: function() {
        this.fetchViewData();
    },

    methods: {

        fetchViewData: function() {

            this.$http.get('manager/price/viewdata')
                .then(function (response) {
                this.$set(this.$data,'vdata', response.data.model.data);
            });

        },

        AddNewPrice: function() {

            // User input
            var data = this.newPrice;

            // Send post request
            this.$http.post('manager/price/post', data).then((response) => {

                if(response.data.status == 'false') {

                    self = this

                    if(response.data.msg.typename) {
                        this.isErrorTypeName = true
                    }
                    if(response.data.msg.count) {
                        this.isErrorCount = true
                    }
                    if(response.data.msg.price) {
                        this.isErrorPrice = true
                    }

                    setTimeout(function () {
                        self.isErrorTypeName = false
                        self.isErrorCount = false
                        self.isErrorPrice = false
                    }, 5000)

                    this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');

            } else {
                    this.fetchViewData();
                    this.newPrice = { typename:'', count:'', price:''}
                    this.Notify('Success','เพิ่มรายการแล้ว','success');
                }

            }, (response) => {
                // error callback
            });

        },

        RemovePrice: function(id) {

            var ConfirmBox = confirm("Are you sure, you want to delete this User?")

			if(ConfirmBox) this.$http.post('manager/price/remove', {id : id}) .then((response) => {
                                this.fetchViewData();
                                this.Notify('Success','ลบรายการที่เลือกแล้ว','success');
                           }, (response) => {
                                // error callback
                           });

        },

        Notify: function(title,text,type) {
            new PNotify({
                title: title,
                text: text,
                type: type,
                styling: 'bootstrap3'
            });
        }

    },

});

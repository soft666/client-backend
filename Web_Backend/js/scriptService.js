new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN' : document.querySelector('#token').getAttribute('value')
        }
    },
    
    el: '#ServiceController',
    data: { newService: {
                name: '',
		    },
            vdata: [],
            success: false,
            msg: '',
            isErrorName: false,
    },

    mounted: function() {
        this.fetchViewData();
    },

    methods: {

        fetchViewData: function() {

            this.$http.get('manager/service/viewdata')
                .then(function (response) {
                this.$set(this.$data,'vdata', response.data.model.data);
            });

        },

        AddNewService: function() {

            // User input
            var data = this.newService;
            
            // Send post request
            this.$http.post('manager/service/post', data).then((response) => {

                if(response.data.status == 'false') {

                    self = this
                    if(response.data.msg.name) {
                        this.isErrorName = true
                    }
                    
                    setTimeout(function () {
                        self.isErrorName = false
                    }, 5000)

                    this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');

            } else {
                    this.fetchViewData();
                    this.newService = { name:'' }
                    this.Notify('Success','เพิ่มรายการแล้ว','success');
                }

            }, (response) => {
                // error callback
            });
            
        },

        RemovePrice: function(id) {

            var ConfirmBox = confirm("Are you sure, you want to delete this User?")

			if(ConfirmBox) this.$http.post('manager/service/remove', {id : id}) .then((response) => {
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



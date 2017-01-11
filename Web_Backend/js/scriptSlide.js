new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN' : document.querySelector('#token').getAttribute('value')
        }
    },

    el: '#ServiceController',
    data: {
            vdata: [],
            success: false,
            msg: '',
            isErrorimage: false,
            image_file: '',
    },

    mounted: function() {
        this.fetchViewData();
    },

    methods: {
        fetchViewData: function() {
            this.$http.get('manager/slide/viewdata')
                .then(function (response) {
                this.$set(this.$data,'vdata', response.data.model.data);
            });
        },
        AddNewSlide: function() {
            // User input
            var formData = new FormData();
            formData.append('image', $('#image_file')[0].files[0]);
            this.$http.post('manager/slide/post', formData).then((resoponse) => {
                if (resoponse.data.errors) {
                  this.Notify('Error','ใส่รูปภาพได้ไม่เกิน 5 ภาพ','error');
                } else {
                  this.Notify('Success','เพิ่มรูปภาพสำเร็จ','success');
                  var control = $("#image_file");
                  control.replaceWith( control = control.clone( true ) );
                  this.fetchViewData();
                }

            }, (response) => {
                this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');
            });
        },
        RemoveSlide: function(id) {

            var ConfirmBox = confirm("Are you sure, you want to delete this User?")

			if(ConfirmBox) this.$http.post('manager/slide/remove', {id : id}) .then((response) => {
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

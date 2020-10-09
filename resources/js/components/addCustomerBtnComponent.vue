<template>
    <div>
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#addCustomerModal"
        >
            اضافة عميل
        </button>

        <!-- Modal -->
        <div
            v-show="ModelShow"
            class="modal fade"
            id="addCustomerModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="addCustomerModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog text-right" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCustomerModalLabel">
                            اضافة عميل
                        </h5>
                        <button
                            type="button"
                            class="close left"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-md-12">
                            <label for="name">اسم العميل</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="name"
                                id="name"
                                aria-describedby="helpId"
                                placeholder="اسم العميل"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="phone">هاتف العميل</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="phone"
                                id="phone"
                                aria-describedby="helpId"
                                placeholder="اسم العميل"
                            />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">عنوان العميل</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="address"
                                id="address"
                                aria-describedby="helpId"
                                placeholder="اسم العميل"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            الغاء
                        </button>
                        <button
                            type="button"
                            @click="add_customer"
                            class="btn btn-primary"
                        >
                            انشاء
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const Toast = Swal.mixin({
    toast: true,
    showConfirmButton: false,
    timer: 3000
});

export default {
    props: ["amount"],
    components: {},
    mounted() {},
    data() {
        return {
            name: "",
            phone: "",
            address: "",
            ModelShow: false
        };
    },
    methods: {
        add_customer() {
            // validtions
            if (this.name == 0 || this.name == "") {
                swal("عفوا!", "الرجاء كتابه اسم العميل!", "warning");
                return;
            } else if (this.phone == 0 || this.phone == "") {
                swal("عفوا!", "الرجاء كتابه رقم الهاتف!", "warning");
                return;
            }
            axios
                .get("/api/customer/create", {
                    params: {
                        name: this.name,
                        phone: this.phone,
                        address: this.address
                    }
                })
                .then(response => {
                    console.log(response.data);
                    if (response.status === 200) {
                        $("#addCustomerModal").modal("hide");
                        swal("رائع!", "تم اضافة عميل بنجاح", "success");
                    }
                    if (response.status === 204) {
                        swal("خطاء!", "يوجد الخطاء الرجاء ملى كل البيانات", "warning");
                    }
                })
                .catch(error => {});
        }
    }
};
</script>
<style lang="stylus" scoped></style>

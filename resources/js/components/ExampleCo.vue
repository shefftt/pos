<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="form-group ml-auto">
                        <Customer></Customer>
                    </div>
                    <div class="form-group mr-auto">
                        <label for=""></label>
                        <input
                            @keyup="get_product_name"
                            type="text"
                            v-model="product_name"
                            class="form-control"
                            placeholder="اسم المنتج"
                        />
                        <ul style="position: absolute;" class="list-group">
                             <li
                                class="list-group-item"
                                @click="select_product(product)"
                                v-for="product in products"
                                :key="product.id"
                            >
                                {{ product.name }}
                            </li>
                            <!-- <li class="list-group-item"  @click="create_product()">اضافة منتج</li> -->
                        </ul>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>السعر</th>
                            <th>الكميه</th>
                            <th>السعر الكلى</th>
                            <th>ضبط</th>
                        </tr>
                    </thead>
                    <tbody id="product">
                        <tr v-for="product in products_table" :key="product.id">
                            <td>{{ product.name }}</td>
                            <td>{{ product.price }}</td>
                            <td>
                                <button
                                    class="btn btn-sm"
                                    @click="in_crease(product)"
                                >
                                    +
                                </button>
                                {{ product.qyt }}
                                <button
                                    class="btn btn-sm"
                                    @click="de_crease(product)"
                                >
                                    -
                                </button>
                            </td>
                            <td>{{ product.subtotal }}</td>
                            <td>
                                <p @click="remvoe_form_table(product)">
                                    <i
                                        class="nav-icon fa fa-remove label-danger"
                                    ></i>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-muted">
                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">الدفع:</p>

                        <p
                            class="text-muted well well-sm shadow-none"
                            style="margin-top: 10px;"
                        >
                            الفاتورة صالحه لمده اسبوعين فقط
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Total:</th>
                                    <td>SDG {{ total }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button @click="btnSave" class="btn btn-success">
                        اضافه
                    </button>
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

import Customer from "./CustomerComponent";

export default {
    components: {
        Customer
    },
    mounted() {
        console.log("fffffffffffffff");
    },
    data() {
        return {
            product_name: "",
            products: [],
            products_list: [],
            products_table: [],
            total: 0
        };
    },
    methods: {
        btnSave() {
            console.log("btnSave");
            axios
                .get("/sales/user", {
                    params: {
                        products_table: this.products_table,
                        total: this.total
                    }
                })
                .then(function(response) {
                    // this.products_table.total = null;
                    // const map = new Map(Object.entries(this.products_table));
                    if (response.status == 201) {
                        alert(response.data);

                        this.products_table = [];
                        this.products_table.total = null;
                    }
                    console.log("save " + response.data);
                })
                .catch(error => {});

            // alert("dddddddddddd")
        },
        get_product_name() {
            axios
                .get("/submit", { params: { product_name: this.product_name } })
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("dddddddddddddddddddd");
                    }
                });
        },

        select_product(product) {
            var product_exe = false;
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (var i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    product_exe = true;
                    obj = this.products_table.find(o => o.id === product.id);
                    obj.qyt += 1;
                    obj.subtotal = obj.price * obj.qyt;
                }
            }

            // console.log(obj);
            // return;
            if (product_exe !== true) {
                this.products_table.push({
                    id: product.id,
                    name: product.name,
                    price: product.sale_price,
                    qyt: 1,
                    subtotal: product.sale_price
                });
            }

            this.products = null;
            this.product_name = "";
            this.total += product.sale_price;
        },
        /**
         * حذف المنتج من الفاتوره
         * @param object product كافه بييانات المنتج
         */
        remvoe_form_table(product) {
            // تحديث السعر الكلى
            this.total -= product.subtotal;

            // جلب الاندكس بتاع المنتج فى الجدول
            var id = this.products_table.indexOf(product);

            // حذف المنتج من الجدول
            this.products_table.splice(id, 1);
        },
        in_crease(product) {
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (var i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    obj.qyt += 1;
                    obj.subtotal = obj.price * obj.qyt;
                }
            }
            this.total += obj.price;
        },
        de_crease(product) {
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (var i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    if (obj.qyt > 1) {
                        obj.qyt -= 1;
                        obj.subtotal = obj.price * obj.qyt;
                        this.total -= obj.price;
                    }
                }
            }
        },
        create_product() {
            alert("create_product");
        }
    }
};
</script>
<style lang="stylus" scoped></style>

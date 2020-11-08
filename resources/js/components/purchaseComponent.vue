<template>
    <div class="col-12">
        <div class="card text-right">
            <div class="card-header">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="stock_id">الموردين</label>
                        <select
                            class="form-control form-control-sm"
                            name="supplier_id"
                            id="supplier_id"
                            v-model="supplier_id"
                        >
                            <option
                                v-for="supplier in suppliers"
                                :value="supplier.id"
                                :key="supplier.id"
                            >
                                {{ supplier.name }}</option
                            >
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="payment_id">طريقه الدفع</label>
                        <select
                            class="form-control form-control-sm"
                            name="payment_id"
                            id="payment_id"
                            v-model="payment_method"
                        >
                            <option
                                v-for="payment in payments"
                                :value="payment.id"
                                :key="payment.id"
                            >
                                {{ payment.name }}</option
                            >
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="stock_id">المخزن</label>
                        <select
                            class="form-control form-control-sm"
                            name="stock_id"
                            id="stock_id"
                            v-model="stock_id"
                        >
                            <option
                                v-for="stock in stocks"
                                :value="stock.id"
                                :key="stock.id"
                            >
                                {{stock.name}}</option
                            >
                        </select>
                    </div>

                    <div class="form-group col-md-4 mr-auto">
                        <label for="product_name">اسم المنتج</label>
                        <input
                            id="product_name"
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

                    <div class="form-group col-md-4 mr-auto">
                        <label for="invoice_number">رقم الفاتوره</label>
                        <input
                            id="invoice_number"
                            type="text"
                            v-model="invoice_number"
                            class="form-control"
                            placeholder="رقم الفاتوره"
                        />
                    </div>
                    <div class="form-group col-md-4 mr-auto">
                        <label for="product_barcode">الباركود</label>
                        <input
                            id="product_barcode"
                            ref="product_barcode"
                            @keyup.enter="get_product_barcode"
                            type="text"
                            v-model="product_barcode"
                            class="form-control"
                            placeholder="الباركود"
                        />
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
                            <th>مجموع السعر</th>
                            <th>ضبط</th>
                        </tr>
                    </thead>
                    <tbody id="product">
                           <tr
                                    v-for="product in products_table"
                                    :key="product.id"
                                >
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.price }}</td>
                                    <td>
                                        <img
                                            src="/../image/add.png"
                                            @click="in_crease(product)"
                                        />
                                        {{ product.qyt }}

                                        <img
                                            src="/image/minus.png"
                                            @click="de_crease(product)"
                                        />
                                    </td>
                                    <td>{{ product.subtotal }}</td>
                                    <td>
                                        <img
                                            src="/image/delete.png"
                                            @click="remove_form_table(product)"
                                        />
                                    </td>
                                </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">الدفع:</p>

                        <p
                            class="text-muted well well-sm shadow-none"
                            style="margin-top: 10px;"
                        >
                            <!-- الفاتورة صالحه لمده اسبوعين فقط -->
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
            <div class="card-footer text-muted">
                <div class="col-md-12">
                    <div class="form-group">
                        <button
                            @click="create_purchase_invoice"
                            class="btn btn-lg btn-info"
                        >
                            انشاء فاتوره
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

import Customer from "./CustomerComponent";

export default {
    components: {
        Customer
    },
    mounted() {
        this.get_stock_name();
        this.get_supplier_name();
        this.get_payments();
    },
    data() {
        return {
            product_name: "",
            invoice_number: "",
            product_barcode: "",
            products: [],
            products_list: [],
            products_table: [],

            payments: [],
            account_id: 1,

            stocks: [],
            stock_id: 0,

            suppliers: [],
            supplier_id: 0,

            payment_method: 1,

            total: 0
        };
    },
    methods: {
        create_purchase_invoice() {
            // validtions
            if (this.supplier_id == 0 || this.supplier_id == "") {
                swal("عفوا!", "الرجاء اختيار المورد اولا!", "warning");
                return;
            } else if (this.stock_id == 0 || this.stock_id == "") {
                swal("عفوا!", "الرجاء اختيار المخزن اولا!", "warning");
                return;
            } else if (this.invoice_number == "") {
                this.invoice_number = 0;
            } else if (this.products_table.length == 0 || this.total == "") {
                swal("عفوا!", "لايمكن انشاء فاتوره بدون منتجات!", "warning");
                return;
            }
            axios
                .get("/api/create_purchase_invoice", {
                    params: {
                        products_table: this.products_table,
                        total: this.total,
                        invoice_number: this.invoice_number,
                        stock_id: this.stock_id,
                        supplier_id: this.supplier_id,
                        payment_method: this.payment_method
                    }
                })
                .then(response => {
                    if (response.status === 200) {
                        console.log(response.data);
                        this.products_table = [];
                        this.total = 0;
                        // this.total = "";
                        this.invoice_number = null;
                        swal("رائع!", "تم انشاء الفاتورة بنجاح", "success");
                    }
                    if (response.status === 204) {
                        alert("الرجاء وضع منتجات اولا");
                    }
                })
                .catch(error => {});
        },
        get_product_name() {
            axios
                .get("/submit", { params: { product_name: this.product_name } })
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },
        get_payments() {
            axios
                .get("/api/payments")
                .then(response => {
                    this.payments = response.data;
                })
                .catch(error => {});
        },
        get_stock_name() {
            axios
                .get("/api/stocks")
                .then(response => {
                    console.log("ahmed hme : " + response);
                    this.stocks = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },
        get_supplier_name() {
            axios
                .get("/api/suppliers")
                .then(response => {
                    this.suppliers = response.data;
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },
        get_product_barcode() {
            axios
                .get("/api/get_product_barcode", {
                    params: { product_barcode: this.product_barcode }
                })
                .then(response => {
                    if (!response.data.barcode) {
                        swal("تحديث!", "عفوا المنتج غير موجود!", "warning");
                        this.product_barcode = "";
                        this.$refs.product_barcode.focus();
                    } else {
                        this.select_product(response.data);
                        this.product_barcode = "";
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        console.log("");
                    }
                });
        },

        select_product(product) {
            let product_exe = false;
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
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
                    vat: product.vat,
                    name: product.name,
                    price: product.purchase_price,
                    qyt: 1,
                    subtotal: product.purchase_price
                });
            }

           this.total = parseFloat(this.total) + parseFloat(product.purchase_price);
            this.products = null;
            this.product_name = "";
        },
        /**
         * حذف المنتج من الفاتوره
         * @param product
         */
        remove_form_table(product) {
                // swal("هل انت متاكد من حذف المنتج!", "error");
            // تحديث السعر الكلى
            (this.total) =  parseFloat(this.total) - parseFloat(product.subtotal);

            // جلب الاندكس بتاع المنتج فى الجدول
            let id = this.products_table.indexOf(product);

            // حذف المنتج من الجدول
            this.products_table.splice(id, 1);
        },
        in_crease(product) {
              let obj;
            // التاكد من عدمlogin وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    obj.qyt += 1;
                    (obj.subtotal) = parseFloat(obj.price) * parseFloat(obj.qyt);
                }
            }
            (this.total) = parseFloat(this.total) +  parseFloat(obj.price);
        },
        de_crease(product) {
               let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    if (obj.qyt > 1) {
                       (obj.qyt) -= 1;
                        (obj.subtotal) = parseFloat(obj.price) * parseFloat(obj.qyt);
                        (this.total) -= parseFloat(obj.price);
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

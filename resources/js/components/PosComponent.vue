<template>
    <div class="px-4">
        <div class="row">
            <div class="col-8">
                <div class="card text-right" style="min-height: 95vh;">
                    <div class="card-header">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="stock_id">العميل</label>
                                <select
                                    class="form-control form-control-sm"
                                    name="customer_id"
                                    id="customer_id"
                                    v-model="customer_id"
                                >
                                    <option
                                        v-for="customer in customers"
                                        :value="customer.id"
                                        :key="customer.id"
                                    >
                                        {{ customer.name }}</option
                                    >
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for=""></label>
                                <add-customer-btn amount="222222222222" />
                            </div>

                            <div class="form-group col-md-6">
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
                            <!-- <div class="form-group col-md-3">
                                <label for="payment_id">نوع الفاتوره</label>
                                <select
                                    class="form-control form-control-sm"
                                    name="invoice_type"
                                    id="payment_id"
                                    v-model="invoice_type"
                                >
                                    <option value="normal">فاتورة عاديه</option>
                                    <option value="refund">فاتورة راجعه</option>
                                </select>
                            </div> -->

                            <div class="form-group col-md-6 mr-auto">
                                <label for="product_name">اسم المنتج</label>
                                <input
                                    id="product_name"
                                    @keyup="get_product_name"
                                    type="text"
                                    v-model="product_name"
                                    class="form-control"
                                    placeholder="اسم المنتج"
                                />
                                <div>
                                    <ul
                                        style="position: absolute;z-index: 1000;width: 96%;margin-top: 5px;"
                                        class="list-group"
                                    >
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

                            <div class="form-group col-md-6 mr-auto">
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
                                    <th>السعر الكلى</th>
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
                                            src="image/add.png"
                                            @click="in_crease(product)"
                                        />
                                        {{ product.qyt }}

                                        <img
                                            src="image/minus.png"
                                            @click="de_crease(product)"
                                        />
                                    </td>
                                    <td>{{ product.subtotal }}</td>
                                    <td>
                                        <img
                                            src="image/delete.png"
                                            @click="remove_form_table(product)"
                                        />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-right">
                    <div class="card-body">
                        <table class="table table-bordered ">
                            <!-- <table class="table table-striped table-inverse table-responsive"> -->
                            <tr>
                                <td>المجموع</td>
                                <td>{{ total }}</td>
                            </tr>
                            <tr>
                                <td>الضريبه</td>
                                <td>{{ vat }}</td>
                            </tr>
                            <tr>
                                <td>المجموع + الضريبه</td>
                                <td>{{ vat_total_c }}</td>
                            </tr>
                            <tr>
                                <td>نسبه التخفيض</td>
                                <td>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="discount"
                                            placeholder="نسبه التخفيض"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>المبلغ المدفوع</td>
                                <td>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="amount_paid"
                                            placeholder="المبلغ المدفوع"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>المبلغ بعد التخفيض</td>
                                <td>{{ total - total * (discount / 100) }}</td>
                            </tr>

                            <tr>
                                <td>المبلغ المجموع قبل التحفيض</td>
                                <td>{{ total }}</td>
                            </tr>
                            <tr>
                                <td>المبلغ المبتقى</td>
                                <td>{{ total - amount_paid }}</td>
                            </tr>
                        </table>

                        <hr />
                        <div class="col-12 form-group text-right">
                            <a
                                id="new_pos"
                                v-shortkey.push="['f1']"
                                @shortkey="hold_sales_invoice"
                                class="btn btn-dark btn-block"
                                target="_blank"
                                href="/pos"
                                role="button"
                            >
                                تعليق فاتورة F1
                            </a>
                        </div>
                        <div class="col-12 form-group text-right">
                            <button
                                @click="create_sales_invoice"
                                v-shortkey.push="['f2']"
                                @shortkey="create_sales_invoice"
                                class="btn-info btn btn-block btn-info"
                            >
                                انشاء فاتوره F2
                            </button>
                        </div>
                        <div class="col-12 form-group text-right">
                            <button
                                @click="delete_sales_invoice"
                                class="btn-danger btn btn-block btn-info"
                                v-shortkey.push="['f3']"
                                @shortkey="delete_sales_invoice"
                            >
                                حذف F3
                            </button>
                        </div>
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
    components: {},
    mounted() {
        this.get_stock_name();
        this.get_customer_name();
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
            amount_paid: null,

            stocks: [],
            stock_id: 0,
            invoice_type: "normal",

            customers: [],
            customer_id: 0,

            discount: 0,

            payment_method: 1,

            total: 0,
            vat_total: 0
        };
    },
    methods: {
        hold_sales_invoice() {
            document.getElementById("new_pos").onClick();
        },
        delete_sales_invoice() {
            this.products_table = [];
            this.total = 0;
            this.vat_total = 0;
        },
        create_sales_invoice() {
            // validtions
            if (
                this.payment_method == 3 &&
                (this.customer_id == 0 || this.customer_id == "")
            ) {
                swal(
                    "عفوا!",
                    "فى حاله البيع اجل الرجاء اختيار العميل!",
                    "warning"
                );
                return;
            } else if (this.total == 0 || this.total == "") {
                swal("عفوا!", "لايمكن انشاء فاتوره بدون منتجات!", "warning");
                return;
            }
            axios
                .get("/api/create_sales_invoice", {
                    params: {
                        products_table: this.products_table,
                        total: this.total,
                        customer_id: this.customer_id,
                        payment_method: this.payment_method
                    }
                })
                .then(response => {
                    if (response.status === 200) {
                        console.log(response.data);
                        this.products_table = [];
                        this.total = 0;
                        window.location.replace(
                            "print/" + response.data.invoice_id
                        );
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
        get_customer_name() {
            axios
                .get("/api/customers")
                .then(response => {
                    this.customers = response.data;
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
                        swal("خطاء!", "عفوا المنتج غير موجود!", "warning");
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
                    obj.sub_vat = obj.vat * obj.qyt;
                }
            }

            // console.log(obj);
            // return;
            if (product_exe !== true) {
                this.products_table.push({
                    id: product.id,
                    vat: product.vat,
                    sub_vat: product.vat,
                    name: product.name,
                    price: product.sale_price,
                    qyt: 1,
                    subtotal: product.sale_price
                });
            }

            this.total =
                parseFloat(this.total) + parseFloat(product.sale_price);
            this.vat_total =
                parseFloat(this.vat_total) + parseFloat(product.vat);
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
            this.total = parseFloat(this.total) - parseFloat(product.subtotal);

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
                    obj.subtotal = parseFloat(obj.price) * parseFloat(obj.qyt);
                    obj.sub_vat = parseFloat(obj.vat) * parseFloat(obj.qyt);
                }
            }
            this.total = parseFloat(this.total) + parseFloat(obj.price);
            this.vat_total = parseFloat(this.vat_total) + parseFloat(obj.vat);
        },
        de_crease(product) {
            let obj;
            // التاكد من عدم وجود المنتج فى القائمه
            for (let i = 0; i < this.products_table.length; i++) {
                if (this.products_table[i].id === product.id) {
                    obj = this.products_table.find(o => o.id === product.id);
                    if (obj.qyt > 1) {
                        obj.qyt -= 1;
                        obj.subtotal =
                            parseFloat(obj.price) * parseFloat(obj.qyt);
                        this.vat_total =
                            parseFloat(this.vat_total) + parseFloat(obj.vat);
                        this.total -= parseFloat(obj.price);
                    }
                }
            }
        },
        create_product() {
            alert("create_product");
        }
    },
    computed: {
        vat : function(){
            this.vat_total =  (this.total * 0.15).toFixed(2);
            return  this.vat_total;
        },
        vat_total_c : function(){
            let x;
            x= parseFloat(this.total) + parseFloat(this.vat)
            return x.toFixed(2);
        },
    },
};
</script>
<style lang="stylus" scoped></style>

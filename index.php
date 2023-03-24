<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        html {
            font-size: 10px;
        }

        nav {
            display: flex;
            justify-content: space-around;
            margin-bottom: 2rem;
        }

        body {
            margin: .5rem 2.5rem;
            font-size: 1.4rem;
        }

        main {
            display: grid;
            grid-gap: 3rem;
            grid-template-columns: repeat(5, 1fr);

        }

        aside {
            grid-column: span 1;
            padding: 1rem;
            border: solid 1px black;
            border-radius: 4px;
        }

        section {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 1.5rem;
            grid-column: span 4;
        }

        article {
            padding: 1rem;
            border: solid 1px black;
            border-radius: 4px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
        }
    </style>
</head>
<div id="app">
    <nav>
        <input type="button" value="каталог" @click="them=1">
        <input type="button" value="изменить каталог" @click="them=2">
        <input type="button" value="третий шаблон" @click="them=3">
        <input type="button" value="поиск по загаловкам" @click="them=4">
    </nav>
    <template v-if="them==1">
        <main>
            <aside>
                <div class="prop__item _chekbox">
                    <input v-for="phone in phones">

                </div>

            </aside>
            <section>
                <article v-for="phone in phones">
                    <header>{{phone.company}}</header>
                    <p>{{phone.title}}</p>
                    <p>{{phone.color}}</p>
                    <footer>{{phone.price}} руб.</footer>
                </article>
            </section>
        </main>

    </template>
    <template v-else-if="them==2">
        <p>
            <button v-on:click="this.them = 2.2">Добавить</button>
        </p>
        <ul>
            <li v-for="(phone, index) in phones">
                <p @click="openElement(index)">{{ phone }}</p>
            </li>
        </ul>
    </template>
    <template v-else-if="them==2.1">
        <p>{{ phones[i] }}</p>

        <div class="prop__item">
            <label for="title">Модель</label>
            <input id="title" type="text" v-model="phones[i].title">
        </div>
        <div class="prop__item">
            <label for="company">Бренд</label>
            <input id="company" type="text" v-model="phones[i].company">
        </div>
        <div class="prop__item">
            <label for="price">Цена</label>
            <input id="price" type="text" v-model="phones[i].price">
        </div>
        <div class="prop__item">
            <label for="color">Цвет</label>
            <input id="color" type="text" v-model="phones[i].color">
        </div>

        <button @click="this.them = 2">Готово</button>
    </template>

    <template v-else-if="them==2.2">
        <p> title: {{newTitle}}, company: {{newCompany}}, price: {{newPrice}}, color: {{newColor}} </p>

        <div class="prop__item">
            <label for="title">Модель</label>
            <input id="title" type="text" v-model="newTitle">
        </div>
        <div class="prop__item">
            <label for="company">Бренд</label>
            <input id="company" type="text" v-model="newCompany">
        </div>
        <div class="prop__item">
            <label for="price">Цена</label>
            <input id="price" type="text" v-model="newPrice">
        </div>
        <div class="prop__item">
            <label for="color">Цвет</label>
            <input id="color" type="text" v-model="newColor">
        </div>
        <button @click="addElement">Сохранить</button>
    </template>
    <template v-else-if="them==3">

    </template>
    <template v-else-if="them==4">
        <p><input type="text" v-model="searchVal" /></p>
        <ul>
            <li v-for="phone in filteredList">
                <p>{{ phone.company }} - {{ phone.title }} </p>
            </li>
        </ul>
    </template>




</div>
<script src="https://unpkg.com/vue@next"></script>
<script>
    const vueApp = Vue.createApp({
        data() {
            return {
                them: 1,
                searchVal: '',
                phones: [
                    { title: 'iPhone 12', company: 'Apple', price: 65000, color: 'red' },
                    { title: 'Galaxy S20', company: 'Samsung', price: 63000, color: 'grey' },
                    { title: 'Galaxy A10', company: 'Samsung', price: 38000, color: 'black' },
                    { title: 'iPhone 10', company: 'Apple', price: 45000, color: 'red' },
                    { title: 'F3', company: 'Pocco', price: 23000, color: 'black' },
                    { title: '11T', company: 'OnePlus', price: 40500, color: 'grey' },
                    { title: '7500', company: 'Nokia', price: 80000, color: 'grey' },
                    { title: 'Redmi 10', company: 'Xiaomi', price: 15000, color: 'red' },
                    { title: 'Redmi 8', company: 'Xiaomi', price: 42000, color: 'black' }
                ],
                i: null,
                newTitle: '',
                newCompany: '',
                newPrice: '',
                newColor: '',
            }
        },
        computed: {
            filteredList() {
                let comp = this.searchVal;
                return this.phones.filter(function (el) {
                    if (comp == '')
                        return false;
                    else {
                        phoneName = el.company.toLowerCase() + ' ' + el.title.toLowerCase();

                        return phoneName.indexOf(comp.toLowerCase()) > -1;
                    }
                });
            },


        },
        methods: {
            openElement(index) {
                this.them = 2.1
                this.i = index;
            },
            addElement() {
                this.phones.push({ title: this.newTitle, company: this.newCompany, price: this.newPrice, color: this.newColor })
                this.them = 2
            }



        },
    });
    vueApp.mount('#app');
</script>
</body>

</html>

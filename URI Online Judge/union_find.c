#include<stdio.h>

int pai[50000], nome[50000], raiz[50000], tam[50000], count_conjuntos;

void gerar(int n){
    for(int i = 0; i < n; ++i){
            raiz[i]  = i;
            tam[i] = 1;
            pai[i] = 0;
            nome[i] = i;
    }
}

// usando o método de compressão de caminhos
void comp_buscar(int x){
    int y = x;
    while(pai[y] != 0) {
        y = pai[y];
    }
    while(pai[x] != 0){
        int z = pai[x];
        pai[x] = y;
        y = z;
    }
    comp_buscar(nome[y]);
}

void fundir(int a, int b){
    int ra = raiz[a];
    int rb = raiz[b];
    int temp;
    if(ra != rb) {
        count_conjuntos--;
        if(tam[a] < tam[b]){
            temp = ra;
            ra = rb;
            rb = temp;
        }
        pai[rb] = ra;
        nome[ra] = a;
        tam[a] = tam[a] + tam[b];
        raiz[a] = ra;
        raiz[b] = 0;
    }
}

int main(){
    int count_case=1, n, m, i, j;

    while(1){
        scanf("%d %d",&n,&m);
        if(n == 0) break;

        gerar(n);

        count_conjuntos = n;

        while(m--){
            scanf("%d %d",&i,&j);
            fundir(i,j);
        }

        printf("Case %d: %d\n", count_case, count_conjuntos);
        count_case++;
    }

    return 0;
}
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace WindowsFormsApplication1
{
    class OperacoesMatematicas
    {
        public float Somar(float n1, float n2)
        {
            float res = n1 + n2;
            return res;
        }
        public float Diminuir(float n1, float n2)
        {
            float res = n1 - n2;
            return res;
        }
        public float Multiplicar(float n1, float n2)
        {
            float res = n1 * n2;
            return res;
        }
        public float Dividir(float n1, float n2)
        {
            if (n2 == 0)
            {
                return -1;
            }
            else
            {
                float res = n1 / n2;
                return res;
            }
        }
        public float Potencia(float n1, float n2)
        {
            float aux = n1;
            for(float i=n2 - 1 ; i>0 ; i--)
            {
                n1 = n1 * aux;
            }
            return n1;
        }
    }
}

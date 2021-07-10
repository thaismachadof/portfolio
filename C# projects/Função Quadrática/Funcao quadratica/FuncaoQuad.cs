using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Funcao_quadratica
{
    class FuncaoQuad
    {
        public decimal b, c;
        private decimal a;

        public FuncaoQuad(decimal af, decimal bf, decimal cf)
        {
            a = af;
            b = bf;
            c = cf;
        }

        public decimal setA()
        {
            if (a == 0)
                return 8;
            else
                return -1;
        }

        public decimal getA()
        {
            return a;
        }

        public double Raiz1()
        {
            double delta = Convert.ToDouble((b * b) - 4 * a * c);
            double r1 = (Convert.ToDouble(-b) + Math.Sqrt(delta)) / 2 * Convert.ToDouble(a);
            return r1;
        }

        public double Raiz2()
        {
            double delta = Convert.ToDouble((b * b) - 4 * a * c);
            double r2 = (Convert.ToDouble(-b) - Math.Sqrt(delta)) / 2 * Convert.ToDouble(a);
            return r2;
        }

        public decimal ImagemY(decimal x)
        {
            decimal y = a * x * x + b * x + c;
            return y;
        }
    }
}

/**
 * Interfaccia rappresentante un Ordine
 */
export interface Order {
  id: number;
  customer_id: number;
  order_number: string;
  description: string;
  order_data: string;
  total: number;
}
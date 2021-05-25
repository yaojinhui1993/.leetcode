<?php
/*
 * @lc app=leetcode.cn id=122 lang=php
 *
 * [122] 买卖股票的最佳时机 II
 *
 * https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-ii/description/
 *
 * algorithms
 * Easy (67.46%)
 * Likes:    1229
 * Dislikes: 0
 * Total Accepted:    370.3K
 * Total Submissions: 547K
 * Testcase Example:  '[7,1,5,3,6,4]'
 *
 * 给定一个数组 prices ，其中 prices[i] 是一支给定股票第 i 天的价格。
 *
 * 设计一个算法来计算你所能获取的最大利润。你可以尽可能地完成更多的交易（多次买卖一支股票）。
 *
 * 注意：你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 *
 *
 *
 * 示例 1:
 *
 *
 * 输入: prices = [7,1,5,3,6,4]
 * 输出: 7
 * 解释: 在第 2 天（股票价格 = 1）的时候买入，在第 3 天（股票价格 = 5）的时候卖出, 这笔交易所能获得利润 = 5-1 = 4 。
 * 随后，在第 4 天（股票价格 = 3）的时候买入，在第 5 天（股票价格 = 6）的时候卖出, 这笔交易所能获得利润 = 6-3 = 3 。
 *
 *
 * 示例 2:
 *
 *
 * 输入: prices = [1,2,3,4,5]
 * 输出: 4
 * 解释: 在第 1 天（股票价格 = 1）的时候买入，在第 5 天 （股票价格 = 5）的时候卖出, 这笔交易所能获得利润 = 5-1 = 4
 * 。
 * 注意你不能在第 1 天和第 2 天接连购买股票，之后再将它们卖出。因为这样属于同时参与了多笔交易，你必须在再次购买前出售掉之前的股票。
 *
 *
 * 示例 3:
 *
 *
 * 输入: prices = [7,6,4,3,1]
 * 输出: 0
 * 解释: 在这种情况下, 没有交易完成, 所以最大利润为 0。
 *
 *
 *
 * 提示：
 *
 *
 * 1
 * 0
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $prices
     * @return int
     */
    public function maxProfit($prices)
    {
        $total = count($prices);

        $sum = [];

        $current = $prices[0];
        $flag = 1; // -1 已买入，将要买出,  1 已买出，需要买入

        for ($i = 0; $i < $total; $i++) {
            // 今日的价格小于当前的价格，要卖出前一天的股票, 直接跳到一天
            if ($flag === -1) {
                // 买入
                if (isset($prices[$i + 1]) && $prices[$i + 1] > $prices[$i]) {
                    $current = $prices[$i];
                    $flag = 1;
                    // var_dump('current: ' . $current);
                    continue;
                }
            }
            // 卖出股票
            if ((isset($prices[$i + 1]) &&($prices[$i + 1] < $prices[$i])) || ! isset($prices[$i + 1])) {
                $sum[] = $prices[$i] - $current;

                // var_dump($prices[$i], $current);
                $current = $prices[$i + 1];
                $flag = -1;
                continue;
            }

            // $flag = 1;
            // else if ()
        }
        // var_dump($sum);

        return array_sum($sum);
    }
}
// @lc code=end

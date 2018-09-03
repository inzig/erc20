
window.addEventListener('load', function() {
	var web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/dCDiunxupCBkIAUCesBf"));
    checkBalance(web3);
});

function checkBalance(web3){
var tokenAddress = "0xf563549daf64f684858e863e2731f19633d1acb1";
var tokenABI = [
	{
		"constant": true,
		"inputs": [],
		"name": "totalSupply",
		"outputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
			{
				"name": "_owner",
				"type": "address"
			}
		],
		"name": "balanceOf",
		"outputs": [
			{
				"name": "balance",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_to",
				"type": "address"
			},
			{
				"name": "_amount",
				"type": "uint256"
			}
		],
		"name": "transfer",
		"outputs": [
			{
				"name": "success",
				"type": "bool"
			}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": true,
				"name": "from",
				"type": "address"
			},
			{
				"indexed": true,
				"name": "to",
				"type": "address"
			},
			{
				"indexed": false,
				"name": "value",
				"type": "uint256"
			}
		],
		"name": "Transfer",
		"type": "event"
	}
];
var tokenInst = web3.eth.contract(tokenABI).at(tokenAddress);
var address_to_check = window.ethAccount ;
// console.log(address_to_check);

var balance = tokenInst.balanceOf.call(address_to_check);
// var ethbalnce = web3.eth.getBalance(address_to_check);
// $("#ethBalance").html(ethbalnce.c[0]);
$("#balance").html(balance.c[0]);
// console.log(ethbalnce);
}